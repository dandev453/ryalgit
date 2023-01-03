<?php

namespace App\Http\Livewire;

use App\Models\Denomination;
use App\Models\Product;
use Livewire\WithPagination;
use App\Models\Category;
use App\Models\Sale;
use App\Models\SaleDetails;
use App\Models\Customers;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use DB;
use Exception;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class PosComponent extends Component
{
    use WithPagination;
    private $pagination = 5;
    public $perPage = 6;
    public $selected_id, 
    $name,
    $website,
    $phone,
    $registro_fiscal,
    $fullname,
    $lastname,
    $email,
    $check,
    $card,
    $phone_contact,
    $address,
    $postal_code,
    $created_at,
    $country, $pageTitle, $componentName;
    
    public $total,
        $categoryName,
        $search,
        $desc = null, 
        $iva,
        $customer_id,
        $itemsQuantity,
        $quantityOnScan,
        $denominations = [],
        $efectivo,
        $change;

    public function mount()
    {
        $this->categoryName;
        $this->efectivo = 0;
        $this->change = 0;
        $this->total = Cart::getTotal();
        $this->itemsQuantity = Cart::getTotalQuantity();
    }

    public function render()
    {
        $category = $this->categoryName;
        $categories = Category::all();
        $customers = Customers::all();
        // dd(Cart::getContent()->sortBy('name'));
        if (strlen($this->search) > 0) {
            $products = Product::join('categories as c', 'c.id', 'products.category_id')
                ->select('products.*', 'c.name as category')
                ->where('products.name', 'like', '%' . $this->search . '%')
                ->orWhere('products.barcode', 'like', '%' . $this->search . '%')
                ->orWhere('c.name', 'like', '%' . $this->search . '%')
                ->orderBy('products.name', 'asc')
                ->paginate($this->perPage);
        } else {
            if (!$category) {
                $products = Product::join('categories as c', 'c.id', 'products.category_id')
                    ->select('products.*', 'c.name as category')
                    ->orderBy('products.id', 'desc')
                    ->paginate($this->perPage);
            } elseif ($category > 1) {
                $products = Product::join('categories as c', 'c.id', 'products.category_id')
                    ->select('products.*', 'c.name as category')
                    ->where('c.name', [$category])
                    ->orderBy('products.id', 'desc')
                    ->paginate($this->perPage);
            } else {
                return;
            }
        }

        $this->denominations = Denomination::all();
        return view('livewire.pos.component', [
            'products' => $products,
            'customers' => $customers,
            'categories' => $categories,
            'denominations' => Denomination::orderBy('value', 'desc')->get(),
            'cart' => Cart::getContent()->sortBy('name'),
        ])
            ->extends('layouts.theme.pos.app')
            ->section('content');
    }
    public function loadMore(){
        $this->perPage = $this->perPage + 5;
  }

    public function ACash($value)
    {
        $this->efectivo += $value == 0 ? $this->total : $value;
        $this->change = $this->efectivo - $this->total;
    }

    protected $listeners = [
        'scan-code' => 'ScanCode',
        'removeItem' => 'removeItem',
        'clearCart' => 'clearCart',
        'saveSale' => 'saveSale',
    ];
   public function ScanCode($barcode, $cant = 1)
    {
        //dd($barcode);
       
      
        // $quantityOnScan = $this->quantityOnScan;
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
            if($this->quantityOnScan){
                $cant = $this->quantityOnScan;
            }
            Cart::add($product->id, $product->name, $product->price, $cant, $product->image);
            /*$carro = Cart::getContent();
             dd($carro);*/

            $this->total = Cart::getTotal();
            $this->itemsQuantity = Cart::getTotalQuantity();
            $this->resetQuantityUI();
            $this->emit('scan-ok', 'Producto agregado');
        }
    }
   
    public function Store()
    {
        $rules = [
            'name' => 'required|unique:products|min:3',
            'website' => 'required',
            'phone' => 'required',
            'registro_fiscal' => 'required',
            'fullname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone_contact' => 'required',
            'address' => 'required',
            'postal_code' => 'required',
            'country' => 'required',
        ];
        $messages = [
            'name.required' => 'Nombre del cliente es requerido',
            'website.required' => 'Sitio web es requerido',
            'phone.required' => 'El número de telefono es requerido',
            'registro_fiscal.required' => 'El registro fiscal es requerido',
            'fullname.required' => 'El nombre completo es requerido',
            'lastname.required' => 'El apellido es requerido',
            'email.required' => 'El correo eléctronico es requerido',
            'phone_contact.required' => 'El número de telefono de contacto es requerido',
            'address.required' => 'Dirección es requerido',
            'postal_code.required' => 'Codigo postal es requerido',
            'country.required' => 'El país es requerido',
        ];

        $this->validate($rules, $messages);

        $customer = Customers::create([
            'name' => $this->name,
            'website' => $this->website,
            'phone' => $this->phone,
            'registro_fiscal' => $this->registro_fiscal,
            'fullname' => $this->fullname,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'phone_contact' => $this->phone_contact,
            'address' => $this->address,
            'postal_code' => $this->postal_code,
            'country' => $this->country
        ]);
        $this->resetUI();
        $this->emit('scan-ok', 'Cliente Registrado');
    }
    public function resetUI()
    {
        $this->name= '';
        $this->website= '';
        $this->registro_fiscal= '';
        $this->fullname= '';
        $this->lastname= '';
        $this->email= '';
        $this->phone_contact = '';
        $this->address= '';
        $this->postal_code= '';
        $this->country= '';
    }
    public function resetQuantityUI(){
          $this->quantityOnScan= '';
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

            Cart::add($product->id, $product->name, $product->price, $cant, $product->image);
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
        $quantity = $this->quantityOnScan;
        if($this->quantityOnScan){
            $cant = $quantity;
        }
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

        Cart::add($product->id, $product->name, $product->price, $cant, $product->image);
        $this->total = Cart::getTotal();
        $this->itemsQuantity = Cart::getTotalQuantity();
        $this->emit('scan-ok', $title);
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
            if($product->stock < $this->quantityOnScan){
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
        $this->iva = 0;
        $this->desc = 0;
        $this->total = Cart::getTotal();
        $this->itemsQuantity = Cart::getTotalQuantity();
        $this->emit('scan-ok', 'Carro vacío');
    }

      public function saveSale()
    { 
        DB::beginTransaction();
        try {
            $sale = Sale::create([
                'total' => $this->total,
                'items' => $this->itemsQuantity,
                'cash' => $this->efectivo,
                'change' => $this->change,
                'user_id' => Auth()->user()->id,
                'customer_id' => $this->customer_id
            ]);
            if ($sale) {
                $items = Cart::getContent();
                foreach ($items as $item) {
                    SaleDetails::create([
                        'price' => $item->price,
                        'quantity' => $item->quantity,
                        'product_id' => $item->id,
                        'sale_id' => $sale->id,
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
            $this->emit('print-ticket', $sale->id);
        } catch (Exception $e) {
            DB::rollBack();
            $this->emit('sale-error', $e->getMessage());
        }
    }


    public function printTicket($sale)
    {
        return Redirect::To("print/sale/$sale->id");
    }
}
