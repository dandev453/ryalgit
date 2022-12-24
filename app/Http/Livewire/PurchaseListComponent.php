<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Custoemers;
use App\Models\Product;
use App\Models\Supliers;
use App\Models\Purchase;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class PurchaseListComponent extends Component
{   
    public $fromDate, $toDate, $userid, $total, $items, $details;
    public $name, $barcode, $cost, $price, $stock, $purchases, $alerts, $category_id, $search, $image, $selected_id, $pageTitle, $componentName;
    private $pagination = 5;

    public function mount()
    {
        $this->fromDate = null;
        $this->toDate = null;
        $this->purchases = [];
        $this->userid = 0;
        $this->pageTitle = 'REPORTES';
        $this->componentName = 'COMPRAS';
        $this->category_id = 'Seleccione';
        $this->pagination;
    }

    public function render()
    {
        $fi = Carbon::parse($this->fromDate)->format('Y-m-d') . ' 00:00:00';
        $ff = Carbon::parse($this->toDate)->format('Y-m-d') . ' 23:59:59';
        if(!$fi && !$ff){
           $purchases = Purchase::all();
        }
        return view('livewire.compras.purchase_list.component',
        [
            'users' => User::orderBy('name', 'asc')->get(),
            'supliers' =>  Supliers::orderBy('name', 'asc')->get(),
            'purchases' => Purchase::all()
        ])
            ->extends('layouts.theme.app')
            ->section('content');
    }

    public function Consultar()
    {
        $fi = Carbon::parse($this->fromDate)->format('Y-m-d') . ' 00:00:00';
        $ff = Carbon::parse($this->toDate)->format('Y-m-d') . ' 23:59:59';
        $this->purchases = Purchase::whereBetween('created_at', [$fi, $ff])
        ->where('purchases.suplier_id', $this->suplier_id)
        //SELECT WITH JOIN TO CUSTOMERS AND CASHOUT USERS
            ->get();
        $this->total = $this->purchases ? $this->purchases->sum('total') : 0;
        $this->items = $this->purchases ? $this->purchases->sum('items') : 0;
    }
    
}
