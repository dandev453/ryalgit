<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleDetails;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class HomeComponent extends Component
{

    use WithPagination;

    public $permissionName, $search, $selected_id, $pageTitle, $componentName;
    private $pagination = 1;

    public function mount()
    {
        $this->componentName = "Entrada";
    }

    public function paginationView()
    {
        return 'vendor.livewire.admin-lte';
    }

     public function render()
    {

        return view('livewire.Home.component')
        ->extends('layouts.theme.app')
        ->section('content');
    }

}
