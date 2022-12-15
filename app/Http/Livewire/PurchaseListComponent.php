<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class PurchaseListComponent extends Component
{       
    
    public $name, $barcode, $cost, $price, $stock, $alerts, $category_id, $search, $image, $selected_id, $pageTitle, $componentName;
    private $pagination = 5;

    public function mount()
    {
        $this->pageTitle = 'Listado';
        $this->componentName = 'Productos';
        $this->category_id = 'Seleccione';
        $this->pagination;
    }

    public function render()
    {
        $pagination = $this->pagination;
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
                ->orderBy('products.name', 'asc')
                ->paginate();
        }
        return view('livewire.compras.purchase_list.component')
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

            Cart::add($product->id, $product->name, $product->price, $cant, $product->image);
            /*$carro = Cart::getContent();
             dd($carro);*/

            $this->total = Cart::getTotal();
            $this->itemsQuantity = Cart::getTotalQuantity();

            $this->emit('scan-ok', 'Producto agregado');
        }
    }
}
