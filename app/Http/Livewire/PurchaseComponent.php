<?php

namespace App\Http\Livewire;

use App\Models\Denomination;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Category;
use App\Models\Purchase;
use App\Models\PurchaseDetails;
use App\Models\Supliers;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use DB;
use Exception;
use Illuminate\Support\Facades\Redirect;

class PurchaseComponent extends Component
{
    use WithFileUploads, WithPagination;
    private $pagination = 5;
    public $total,
    $categoryName,
    $search,
    $itemsQuantity,
    $denominations = [],
    $efectivo,
    $customer_id,
    $date_purchase,
    $suplier_id,
    $supliers,
    $change;

    public function mount()
    {
        $this->categoryName;
        $this->efectivo = 0;
        $this->change = 0;
        $this->supliers = Supliers::all();
        $this->total = Cart::getTotal();
        $this->itemsQuantity = Cart::getTotalQuantity();
    }

    public function render()
    {
        //Session for purchase cart
        // add cart items to a specific user
        $category = $this->categoryName;
        $categories = Category::all();
        $pagination = $this->pagination;
        $supliers = $this->supliers;
        // dd(Cart::getContent()->sortBy('name'));
        if (strlen($this->search) > 0) {
            $products = Product::join('categories as c', 'c.id', 'products.category_id')
                ->select('products.*', 'c.name as category')
                ->where('products.name', 'like', '%' . $this->search . '%')
                ->orWhere('products.barcode', 'like', '%' . $this->search . '%')
                ->orWhere('c.name', 'like', '%' . $this->search . '%')
                ->orderBy('products.name', 'asc')
                ->paginate($pagination);
        } else {
            $products = Product::join('categories as c', 'c.id', 'products.category_id')
            ->select('products.*', 'c.name as category')
            ->where('products.name', 'like', '%' . $this->search . '%')
            ->orWhere('products.barcode', 'like', '%' . $this->search . '%')
            ->orWhere('c.name', 'like', '%' . $this->search . '%')
            ->orderBy('products.name', 'asc')
            ->paginate($pagination);
        }
        return view('livewire.compras.new_purchase.component', [
            'supliers' => $supliers,
            'products' => $products,
            'cart' => Cart::getContent()->sortBy('name'),
            'data' => $products,
            'categories' => Category::orderBy('name', 'asc')->get(),
        ])
            ->extends('layouts.theme.app')
            ->section('content');
    }

    public function AddtoCart($product, $id)
    {
        //dd($barcode); //LLega el barcode OK!!
       // dd($id); //Producto encontrado!
        
       $product = Product::where('id', $id)->first();
       $cant = 1;
        if ($product == null || empty($product)) {
            $this->emit('scan-notfound', 'El producto no fue encontrado');
        } else {
            if ($this->InCart($product->id)) {
                $this->increaseQty($product->id);
                return;
            }

            if ($product->stock < 1) {
                $this->emit('no-stock', 'Stock insuficiente');
                return;
            }

            Cart::add($product->id, $product->name, $product->price, $cant, $product->image, );
            /*$carro = Cart::getContent();
             dd($carro);*/

            $this->total = Cart::getTotal();
            $this->itemsQuantity = Cart::getTotalQuantity();

            $this->emit('scan-ok', 'Producto agregado');
        }
    }

    public function InCart($productId)
    {
        $exist = Cart::get($productId);
        if ($exist) {
            return true;
        } else {
            return false;
        }
    }

    public function increaseQty($productId, $cant = 1)
    {
        $title = '';
        $product = Product::find($productId);
        $exist = Cart::get($productId);
        if ($exist) {
            $title = 'Cantidad actualizada';
        } else {
            $title = 'Producto agregada';
        }

        if ($product->stock < $cant + $exist->quantity) {
            $this->emit('no-stock', 'Stock insuficiente');
            return;
        }

        Cart::add($product->id,$product->barcode,  $product->name, $product->price, $cant, $product->image);
        $this->total = Cart::getTotal();
        $this->itemsQuantity = Cart::getTotalQuantity();
        $this->emit('scan-ok', $title);
    }
    protected $listeners = [
        'scan-code' => 'ScanCode',
        'removeItem' => 'removeItem',
        'clearCart' => 'clearCart',
        'saveSale' => 'saveSale',
        'providerSelect' => 'selectProvider'
    ];
    public function ScanCode($barcode, $cant = 1)
    {
       // dd($barcode); //** LLega el barcode OK!!
        $product = Product::where('barcode', $barcode)->first();
        //dd($product); //Producto encontrado!
        if ($product == null || empty($product)) {
            $this->emit('scan-notfound', 'El producto no fue encontrado');
        } else {
            if ($this->InCart($product->id)) {
                $this->increaseQty($product->id);
                return;
            }

            if ($product->stock < 1) {
                $this->emit('no-stock', 'Stock insuficiente');
                return;
            }

            Cart::add($product->id, $product->name, $product->price, $cant, $product->image);
            /*$carro = Cart::getContent();
             dd($carro);*/

            $this->total = Cart::getTotal();
            $this->itemsQuantity = Cart::getTotalQuantity();

            $this->emit('scan-ok', 'Producto agregado');
        }
    }


    public function updateQty($productId, $cant = 1)
    {
        $title = '';
        $product = Product::find($productId);
        $exist = Cart::get($productId);
        if ($exist) {
            $title = 'Cantidad actualizada';
        } else {
            $title = 'Producto agregado';
        }

        if ($exist) {
            if ($product->stock < $cant) {
                $this->emit('no-stock', 'Stock insuficiente :/');
                return;
            }
        }

        $this->removeItem($productId);
        if ($cant > 0) {
            Cart::add($product->id, $product->name, $product->price, $cant, $product->image);
            $this->total = Cart::getTotal();
            $this->itemsQuantity = Cart::getTotalQuantity();
            $this->emit('scan-ok', $title);
        }
    }

    public function removeItem($productId)
    {
        Cart::remove($productId);
        $this->total = Cart::getTotal();
        $this->itemsQuantity = Cart::getTotalQuantity();
        $this->emit('scan-ok', 'Producto eliminado');
    }

    public function decreaseQty($productId)
    {
        $item = Cart::get($productId);
        Cart::remove($productId);
        $newQty = $item->quantity - 1;
        if ($newQty > 0) {
            Cart::add($item->id, $item->name, $item->price, $newQty);
        }
        $this->total = Cart::getTotal();
        $this->itemsQuantity = Cart::getTotalQuantity();
        $this->emit('scan-ok', 'Cantidad actualizada');
    }

    public function clearCart()
    {
        Cart::clear();
        $this->efectivo = 0;
        $this->change = 0;
        $this->total = Cart::getTotal();
        $this->itemsQuantity = Cart::getTotalQuantity();
        $this->emit('scan-ok', 'Carro vacío');
    }
   

    public function savePurchase()
    { 
        DB::beginTransaction();
        try {
            $purchase = Purchase::create([
                'total' => $this->total,
                'items' => $this->itemsQuantity,
                //'cash' => $this->efectivo,
                //'change' => $this->change,
                'user_id' => Auth()->user()->id,
                'customer_id' => $this->customer_id,
                'created_at' => $this->date_purchase,
                'suplier_id' => $this->suplier_id
                //Add Supliers
            ]);
            if ($purchase) {
                $items = Cart::getContent();
                foreach ($items as $item) {
                    PurchaseDetails::create([
                        'price' => $item->price,
                        'quantity' => $item->quantity,
                        'product_id' => $item->id,
                        'purchase_id' => $purchase->id,
                    ]);

                    //update STOCK
                    $product = Product::find($item->id);
                    $product->stock = $product->stock - $item->quantity;
                    $product->save();
                }
            }
            DB::commit();

            Cart::clear();
            /*$this->efectivo = 0;*/
            /*$this->change = 0;*/
            $this->total = Cart::getTotal();
            $this->itemsQuantity = Cart::getTotalQuantity();

            $this->emit('sale-ok', 'Compra registrada con éxito');
            $this->emit('print-ticket', $purchase->id);
        } catch (Exception $e) {
            DB::rollBack();
            $this->emit('sale-error', $e->getMessage());
        }
    }



}
