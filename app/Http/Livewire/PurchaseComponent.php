<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;
use App\Models\Provider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
class PurchaseComponent extends Component
{
    use WithFileUploads, WithPagination;
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
            ->where('products.name', 'like', '%' . $this->search . '%')
            ->orWhere('products.barcode', 'like', '%' . $this->search . '%')
            ->orWhere('c.name', 'like', '%' . $this->search . '%')
            ->orderBy('products.name', 'asc')
            ->paginate($pagination);
        }
        return view('livewire.compras.new_purchase.component', [
            'data' => $products,
            'categories' => Category::orderBy('name', 'asc')->get(),
        ])
            ->extends('layouts.theme.app')
            ->section('content');
    }
}
