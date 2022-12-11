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
         $this->pageTitle = 'Reportes';
        $this->componentName = 'ventas';
        $this->fromDate = null;
        $this->toDate = null;
        $this->userid = 0;
        $this->total = 0;
        $this->sales = [];
        $this->details = [];
    }

    public function paginationView()
    {
        return 'vendor.livewire.admin-lte';
    }

    public function render()
    {
        $salesCount = Sale::count();
        $TotalSalesSum = Sale::sum('total');
        $TotalCashSum = Sale::sum('cash');
        //SUM ROW CLIENTS
        //PURCHASE TOTAL SUM IN OUT PURCHASE
        $StockproductsSum = Product::count('id');
        $InventoryProductsSum = Product::sum('price');
        
        $salesLists = Sale::join('users as u', 'u.id', 'sales.user_id')
            ->select('sales.id as s_id','sales.total as total','sales.created_at as fecha','u.name as cliente')
            ->orderBy('s_id','Desc')
            ->where('sales.status', 'Paid')
            ->paginate($this->pagination);

        $products = Product::join('categories as c', 'c.id', 'products.category_id')
            ->select('products.*', 'c.name as category')
            ->orderBy('products.id', 'desc')
            ->paginate($this->pagination);

        $this->componentName = 'Entrada';
        return view('livewire.Home.component', [
            'data' => $products,
            'lsales' => $salesLists,
            'salesCount' => $salesCount,
            'TotalSales' => $TotalSalesSum,
            'StockProducts' => $StockproductsSum,
            'InventoryProductsSum' => $InventoryProductsSum,
            'categories' => Category::orderBy('name', 'asc')->get(),
        ])
            ->extends('layouts.theme.app')
            ->section('content');
    }

    public function viewDetails(Sale $sale)
    {
        $this->details = Sale::join('sale_details as d', 'd.sale_id', 'sales.id')
        ->join('products as p', 'p.id', 'd.product_id')
        ->select('d.sale_id', 'p.name as product', 'd.quantity', 'd.price')
       
        ->where('sales.status', 'Paid')
        ->where('sales.id', $sale->id)
        ->get();
        $this->emit('show-modal', 'Show modal');
    }
}
