<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class lastProductsComponent extends Component
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
        return view('livewire.products.lastproducts', [
            'data' => $products,
            'categories' => Category::orderBy('name', 'asc')->get(),
        ]);
    }
}

?>
