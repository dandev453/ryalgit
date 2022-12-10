<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Sale;
use App\Models\SaleDetails;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Permission;

class HomeComponent extends Component
{
    use WithPagination;

    public $permissionName, $search, $selected_id, $pageTitle, $componentName;
    private $pagination = 5;

    public function mount()
    {
    }

    public function paginationView()
    {
        return 'vendor.livewire.admin-lte';
    }

    public function render()
    {
        $salesLists = Sale::join('sale_details as d', 'd.sale_id', 'sales.id')
            ->join('products as p', 'p.id', 'd.product_id')
            ->join('users as u', 'u.id', 'sales.user_id')
            ->select('d.sale_id', 'p.name as product', 'd.quantity', 'd.price')
            ->where('sales.status', 'Paid')
            ->paginate($this->pagination);

        $products = Product::join('categories as c', 'c.id', 'products.category_id')
            ->select('products.*', 'c.name as category')
            ->orderBy('products.id', 'desc')
            ->paginate($this->pagination);

        $this->componentName = 'Entrada';
        return view('livewire.Home.component', [
            'data' => $products,
            'salesLastlist' => $salesLists,
            'categories' => Category::orderBy('name', 'asc')->get(),
        ])
            ->extends('layouts.theme.app')
            ->section('content');
    }
}
