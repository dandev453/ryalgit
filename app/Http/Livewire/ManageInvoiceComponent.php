<?php

namespace App\Http\Livewire;

use App\Models\Customers;
use App\Models\User;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleDetails;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class ManageInvoiceComponent extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $fromDate, $toDate, $customer, $customer_id ,$search, $user_id, $total, $items, $sales, $details, $reportType;
    private $pagination = 5;
    public function mount()
    {
        $this->pageTitle = 'Reportes';
        $this->componentName = 'ventas';
        $this->fromDate = null;
        $this->toDate = null;
        $this->user_id;
        $this->customer_id;
        $this->total = 0;   
        $reportType = 0;
        $this->sales = [];
        $this->details = [];
    }
     public function paginationView()
    {
        return 'vendor.livewire.admin-lte';
    }
    public function render()
    {
        $pagination = $this->pagination;
        if (strlen($this->search) > 0) {
            $salesLists = Sale::join('customers as c', 'c.id', 'sales.customer_id')
                ->join('users as u', 'u.id', 'sales.user_id')
                ->select('sales.*', 'c.name as cliente', 'u.name as cajero')
                ->where('sales.id', 'like', '%' . $this->search . '%')
                ->orWhere('c.name', 'like', '%' . $this->search . '%')
                ->orWhere('u.name', 'like', '%' . $this->search . '%')
                
                ->orderBy('c.name', 'asc')
                ->paginate();
        } else {
            $salesLists = Sale::join('customers as cliente', 'cliente.id', 'sales.customer_id')
            ->join('users as u', 'u.id', 'sales.user_id')
            ->select('sales.*', 'cliente.name as cliente', 'u.name as cajero')
                ->orderBy('sales.id', 'asc')
                ->paginate($this->pagination);
        }
       if ($this->customer_id){
          
              $salesLists = Sale::join('customers as c', 'c.id', 'sales.customer_id')
                //Search replace by user_id from selected_id
                ->join('users as u', 'u.id', 'sales.user_id')
                ->select('sales.*', 'c.name as cliente', 'u.name as cajero')
                ->where('sales.customer_id', $this->customer_id)
                ->orderBy('cliente', 'asc')
                ->paginate($this->pagination);
            }
            //Separate user id query only fi & ff 
            /*if($fi && $ff && $user_id){
                $salesLists = Sale::join('users as u', 'u.id', 'sales.user_id')
                ->select('sales.*', 'c.name as cliente', 'u.name as cajero')
                ->where('sales.created_at', [$fi, $ff])
                ->Orwhere('sales.customer_id', $this->customer_id)
                ->orderBy('cliente', 'asc')
                ->paginate($this->pagination);
            )
            ->orderBy('s_id','asc')
            ->where('sales.status', 'Paid')
            ->paginate();
            }
            if($fi && $ff){
                $salesLists = Sale::join('users as u', 'u.id', 'sales.user_id')
            ->join('customers as cliente', 'cliente.id', 'sales.customer_id' )
            ->where('sales.status', 'Paid')
            ->where('cliente.id', $customer)
            ->whereBetween('sales.created_at', [$fi, $ff])
            ->select('sales.id as s_id','sales.total as total','sales.cash as cash',
            'sales.created_at as fecha',
            'cliente.name as cliente',
            'u.name as user'
            )
            ->orderBy('s_id','asc')
            ->where('sales.status', 'Paid')
            ->paginate();
          
            }
            */
     
       /* if($user_id){
        $salesLists = Sale::join('users as u', 'u.id', 'sales.user_id')
        ->join('customers as cliente', 'cliente.id', 'sales.customer_id' )
        ->where('sales.status', 'Paid')
        ->where('u.id', 'sales.user_id')
        ->select('sales.id as s_id','sales.total as total','sales.cash as cash',
        'sales.created_at as fecha',
        'cliente.name as cliente',
        'u.name as user'
        )
        ->orderBy('s_id','asc')
         ->where('sales.status', 'Paid')
        ->paginate();
        } */
         $products = Product::join('categories as c', 'c.id', 'products.category_id')
        ->select('products.*', 'c.name as category')
        ->orderBy('products.id', 'desc')
        ->paginate();

        return view('livewire.reports.component', [
            'users' => User::orderBy('name', 'asc')->get(),
            'customers' => Customers::orderBy('name', 'asc')->get(),
            'salesLists' => $salesLists
            ])
            ->extends('layouts.theme.app')
            ->section('content');
          
        }  

  

    public function Consultar()
    {
       
        $customer  = $this->customer;
        $customer_id = $this->customer_id;
        $fi = Carbon::parse($this->fromDate)->format('Y-m-d').' 00:00:00';
        $ff = Carbon::parse($this->toDate)->format('Y-m-d'). ' 23:59:59';
        
        if(!$customer){
        
            $salesLists = Sale::join('users as u', 'u.id', 'sales.user_id')
                ->join('customers as cliente', 'cliente.id', 'sales.customer_id' )
                ->where('sales.status', 'Paid')
                ->where('cliente.id', $customer)
                ->select('sales.id as s_id','sales.total as total','sales.cash as cash',
                'sales.created_at as fecha',
                'cliente.name as cliente',
                'u.name as user'
                )
                ->orderBy('s_id','Desc')
                ->where('sales.status', 'Paid')
                ->paginate();

        

        }
        
          
     
        $this->total = $this->sales ? $this->sales->sum('total') : 0;
        $this->items = $this->sales ? $this->sales->sum('items') : 0;
    }
    public function viewDetails(Sale $sale)
    {
        $fi = Carbon::parse($this->fromDate)->format('Y-m-d 00:00:00');
        $ff = Carbon::parse($this->toDate)->format('Y-m-d 23:59:59');

        $this->details = Sale::join('sale_details as d', 'd.sale_id', 'sales.id')
            ->join('products as p', 'p.id', 'd.product_id')
            ->select('d.sale_id', 'p.name as product', 'd.quantity', 'd.price')
            ->whereBetween('sales.created_at', [$fi, $ff])
            ->where('sales.status', 'Paid')
            ->where('sales.user_id', $this->user_id)
            ->where('sales.id', $sale->id)
            ->get();

        $this->emit('show-modal', 'Show modal');
    }
    public function Print()
    {
    }
}

?>
