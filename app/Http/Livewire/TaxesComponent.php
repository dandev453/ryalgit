<?php

namespace App\Http\Livewire;

use App\Models\Denomination;
use App\Models\Product;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use DB;
use Exception;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class TaxesComponent extends Component
{
    public $total,
        $itemsQuantity,
        $denominations = [],
        $efectivo,
        $change;
    public function mount()
    {
    }

    public function render()
    {
        return view('livewire.taxes.component')
            ->extends('layouts.theme.app')
            ->section('content');
    }
}
