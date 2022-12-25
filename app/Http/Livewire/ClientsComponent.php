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
    private $pagination = 5;

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
            'name.requrired' => 'Nombre del cliente es requerido',
            'website.requrired' => 'Sitio web es requerido',
            'phone.requrired' => 'El número de telefono es requerido',
            'registro_fiscal.requrired' => 'El registro fiscal es requerido',
            'fullname.requrired' => 'El nombre completo es requerido',
            'lastname.requrired' => 'El apellido es requerido',
            'email.requrired' => 'El correo eléctronico es requerido',
            'phone_contact.requrired' => 'El número de telefono de contacto es requerido',
            'street.requrired' => 'Dirección es requerido',
            'postal_code.requrired' => 'Codigo postal es requerido',
            'country.requrired' => 'El país es requerido',
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
        $this->registro_fiscal = $customer->phone;
        $this->fullname = $customer->cost;
        $this->lastname = $customer->alerts;
        $this->email = $customer->category_id;
        $this->phone_contact = null;
        $this->street = null;
        $this->postal_code = null;
        $this->country = null;
        $this->emit('show-modal', 'Show modal');
    }

    public function Update()
    {
        $this->validate($rules, $messages);

        $Customers = Customers::find($this->selected_id);
        $Customers->update([
         'name' => $this->name,
         'website' =>  $this->website,
         'registro_fiscal' => $this->registro_fiscal,
         'fullname' => $this->fullname,
         'lastname' => $this->lastname,
         'email' => $this->email,
         'phone_contact' => $this->phone_contact,
         'street' => $this->street,
         'postal_code' => $this->postal_code,
         'country' => $this->country
        ]);
         $this->resetUI();
        $this->emit('scan-ok', 'Cliente Actualizado');
    }

    protected $listeners = [
        'deleteRow' => 'Destroy',
    ];

    public function Destroy(Customer $customer)
    {
        $customer->delete();
        this->resetUI();
        $this->emit('scan-ok', 'Producto Eliminado');
    }

    public function resetUI()
    {
        $this->name= '';
        $this->website= '';
        $this->registro_fiscal= '';
        $this->fullname= '';
        $this->lastname= '';
        $this->email= '';
        $this->phone_contact = '';
        $this->street= '';
        $this->postal_code= '';
        $this->country= '';
    }
}
