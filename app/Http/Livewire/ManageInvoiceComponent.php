<?php

namespace App\Http\Livewire;

use App\Models\User;
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
    public $fromDate, $toDate, $userid, $total, $items, $sales, $details, $reportType;

    public function render()
    {
        return view('livewire.reports.component', ['users' => User::orderBy('name', 'asc')->get()])
            ->extends('layouts.theme.app')
            ->section('content');
    }

    public function mount()
    {
        $this->pageTitle = 'Reportes';
        $this->componentName = 'ventas';
        $this->fromDate = null;
        $this->toDate = null;
        $this->userid = 0;
        $this->total = 0;
        $reportType = 0;
        $this->sales = [];
        $this->details = [];
    }

    public function Consultar()
    {
        if ($this->reportType == 0) {
            //ventas del día
            $fi = Carbon::parse($this->fromDate)->format('Y-m-d') . ' 00:00:00';
            $ff = Carbon::parse($this->toDate)->format('Y-m-d') . ' 23:59:59';
        } else {
            $fi = Carbon::parse($this->fromDate)->format('Y-m-d') . ' 00:00:00';
            $ff = Carbon::parse($this->toDate)->format('Y-m-d') . ' 23:59:59';
        }
        if (($this->reportType == 1 && $this->fromDate == '') || $this->toDate == '') {
            return;
        }
        if ($this->userid == 0) {
            $this->data = Sale::join('users as u', 'u.id', 'sales.user_id')
                ->select('sales.*', 'u.name as user')
                ->whereBetween('sales.created_at', [$fi, $ff])
                ->get();
        } else {
            $this->data = Sale::join('users as u', 'u.id', 'sales.user_id')
                ->select('sales.*', 'u.name as user')
                ->whereBetween('sales.created_at', [$fi, $ff])
                ->where('user_id', $this->userid)
                ->get();
        }
        $this->sales = Sale::whereBetween('created_at', [$fi, $ff])
            ->where('status', 'Paid')
            ->where('user_id', $this->userid)
            ->get();
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
            ->where('sales.user_id', $this->userid)
            ->where('sales.id', $sale->id)
            ->get();

        $this->emit('show-modal', 'Show modal');
    }
    public function Print()
    {
    }
}

?>
