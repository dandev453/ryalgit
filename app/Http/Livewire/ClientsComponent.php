<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Models\Customers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ClientsComponent extends Component
{
    use WithFileUploads, WithPagination;
    //PROPIEDADES
    public $search, 
    $selected_id, 
    $name,
    $website,
    $phone,
    $registro_fiscal,
    $fullname,
    $lastname,
    $email,
    $phone_contact,
    $adddress,
    $postal_code,
    $country, $pageTitle, $componentName;
    private $pagination = 25;

    public function mount()
    {
        $this->pageTitle = 'Listado';
        $this->componentName = 'Clientes';
    }

    public function paginationView()
    {
        return 'vendor.livewire.admin-lte';
    }

    public function render()
    {
        if (strlen($this->search) > 0) {
            $customers = Customers::where('name', 'like', '%' . $this->search . '%')->paginate($this->pagination);
        } else {
            $customers = Customers::orderBy('id', 'asc')->paginate($this->pagination);
        }
        return view('livewire.clientes.component', ['data' => $customers])
            ->extends('layouts.theme.app')
            ->section('content');
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
            'country' => 'required',
        ];
        $messages = [
            'name' => 'Nombre del cliente es requerido',
            'website' => 'Sitio web es requerido',
            'phone' => 'El número de telefono es requerido',
            'registro_fiscal' => 'El registro fiscal es requerido',
            'fullname' => 'El nombre completo es requerido',
            'lastname' => 'El apellido es requerido',
            'email' => 'El correo eléctronico es requerido',
            'phone_contact' => 'El número de telefono de contacto es requerido',
            'street' => 'Dirección es requerido',
            'postal_code' => 'Codigo postal es requerido',
            'country' => 'El país es requerido',
        ];

        $this->validate($rules, $messages);

        $product = Product::create([
            'name' => $this->name,
            'website' => $this->website,
            'phone' => $this->phone,
            'registro_fiscal' => $this->registro_fiscal,
            'fullname' => $this->fullname,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'phone_contact' => $this->phone_contact,
            'adddress' => $this->address,
            'postal_code' => $this->postal_code,
            'country' => $this->country
        ]);
        $this->resetUI();
        $this->emit('scan-ok', 'Cliente Registrado');
    }

    public function Edit(Customer $customer)
    {
        $this->name = $customer->name;
        $this->website = $customer->website;
        $this->phone = $customer->phone;
        $this->cost = $customer->cost;
        $this->alerts = $customer->alerts;
        $this->category_id = $customer->category_id;
        $this->image = null;

        $this->emit('show-modal', 'Show modal');
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
