<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class  extends Component
{
 		use WithPagination;
    use WithFileUploads;
    
    private $pagination = 10;
    public function paginationView()
    {
        return 'vendor.livewire.admin-lte';
    }
       public function mount()
    {
        $this->pageTitle = 'Nuevos';
        $this->componentName = 'Productos';
    }
     public function render()
    {

		if (strlen($this->search) > 0)
            $products = Product::join('categories as c', 'c.id', 'products.category_id')
        ->select('products.*', 'c.name as category')
        ->where('products.name','like', '%' .$this->search . '%')
        ->orWhere('products.barcode','like', '%' .$this->search . '%')
        ->orWhere('c.name','like', '%' .$this->search . '%')
        ->orderBy('products.name', 'asc')
        ->paginate($this->pagination);
        else
            $products = Product::join('categories as c', 'c.id', 'products.category_id')
        ->select('products.*', 'c.name as category')
        ->orderBy('products.name', 'asc')
        ->paginate($this->pagination);
        return view('livewire.products.lastproducts', [
            'lastproducts' => $products,
            'categories' => Category::orderBy('name', 'asc')->get()
        ]);
         
      }
}


?>