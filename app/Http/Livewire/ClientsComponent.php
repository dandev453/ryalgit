<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ClientsComponent extends Component
{
    use WithFileUploads, WithPagination;

    public function mount()
    {
        $this->pageTitle = 'Listado';
        $this->componentName = 'Proveedores';
    }

    public function paginationView()
    {
        return 'vendor.livewire.admin-lte';
    }

    public function render()
    { 
      return view('livewire.clientes.component')
      ->extends('layouts.theme.app')
      ->section('content');
    }

    public function Edit($id)
    {

    } 

    public function Store()
    {

    }

    public function Update()
    {


    }

    protected $listeners = [
      'deleteRow' => 'Destroy',
  ];

  public function Destroy(Category $category)
  {

  }

  public function resetUI()
  {
      $this->name = '';
      $this->image = null;
      $this->search = '';
      $this->selected_id = 0;
  }
}

?>
