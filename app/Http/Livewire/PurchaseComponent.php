<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class PurchaseComponent extends Component
{
    public function render()
    {
        return view('livewire.compras.component')
            ->extends('layouts.theme.app')
            ->section('content');
    }
}
