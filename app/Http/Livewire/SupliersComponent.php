<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Models\Supliers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SupliersComponent extends Component
{
  use WithFileUploads, WithPagination;
    
  public $name, $search, $image, $selected_id, $pageTitle, $componentName;
  private $pagination = 25;
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
      if (strlen($this->search) > 0) {
        $supliers = Supliers::where('name', 'like', '%' . $this->search . '%')->paginate($this->pagination);
      } else {
        $supliers = Supliers::orderBy('id', 'asc')->paginate($this->pagination);
      }
      return view('livewire.proveedores.component', [
        'data' => $supliers
      ])
      ->extends('layouts.theme.app',['data' => $supliers])
      ->section('content');
      
    }

    public function Edit($id)
    {

    } 

    public function Store()
    {
      $rules = [
        'name' => 'required|unique:products|min:3',
        'website' => 'required',
        'phone' => 'required',
        'registro_fiscal' => 'required',
        'fullname' => 'required',
        'lastname' => 'required',
        'email' => 'required',
        'phone' => 'required',
        'street' => 'required',
        'postal_code' => 'required',
        'country' => 'required'
    ];
      $messages = [
        'name' => 'Nombre del cliente es requerido',
        'website' => 'Sitio web es requerido',
        'phone' => 'El número de telefono es requerido',
        'registro_fiscal' => 'El registro fiscal es requerido',
        'fullname' => 'El nombre completo es requerido',
        'lastname' => 'El apellido es requerido',
        'email' => 'El correo eléctronico es requerido',
        'phone' => 'El número de telefono de contacto es requerido',
        'street' => 'Dirección es requerido',
        'postal_code' => 'Codigo postal es requerido',
        'country' => 'El país es requerido'
    ];
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