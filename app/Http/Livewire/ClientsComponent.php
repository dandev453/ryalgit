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
    $address,
    $postal_code,
    $created_at,
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
            'phone_contact' => 'required',
            'address' => 'required',
            'postal_code' => 'required',
            'country' => 'required',
        ];
        $messages = [
            'name.required' => 'Nombre del cliente es requerido',
            'website.required' => 'Sitio web es requerido',
            'phone.required' => 'El número de telefono es requerido',
            'registro_fiscal.required' => 'El registro fiscal es requerido',
            'fullname.required' => 'El nombre completo es requerido',
            'lastname.required' => 'El apellido es requerido',
            'email.required' => 'El correo eléctronico es requerido',
            'phone_contact.required' => 'El número de telefono de contacto es requerido',
            'address.required' => 'Dirección es requerido',
            'postal_code.required' => 'Codigo postal es requerido',
            'country.required' => 'El país es requerido',
        ];

        $this->validate($rules, $messages);

        $customer = Customers::create([
            'name' => $this->name,
            'website' => $this->website,
            'phone' => $this->phone,
            'registro_fiscal' => $this->registro_fiscal,
            'fullname' => $this->fullname,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'phone_contact' => $this->phone_contact,
            'address' => $this->address,
            'postal_code' => $this->postal_code,
            'country' => $this->country
        ]);
        $this->resetUI();
        $this->emit('scan-ok', 'Cliente Registrado');
    }

    public function Edit(Customers $customer)
    {
        $this->selected_id = $customer->id;
        $this->name = $customer->name;
        $this->website = $customer->website;
        $this->phone = $customer->phone;
        $this->registro_fiscal = $customer->registro_fiscal;
        $this->fullname = $customer->fullname;
        $this->lastname = $customer->lastname;
        $this->email = $customer->email;
        $this->phone_contact = $customer->phone_contact;
        $this->address = $customer->address;
        $this->postal_code = $customer->postal_code;
        $this->country = $customer->country;
        $this->emit('show-modal', 'Show modal');
    }

    public function Update()
    {
        $rules = [
            'name' => "required|min:3|unique:customers,name,{$this->selected_id}",
            'website' => 'required',
            'phone' => 'required',
            'registro_fiscal' => 'required',
            'fullname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'postal_code' => 'required',
            'country' => 'required',
        ];
        $messages = [
            'name.required' => 'Nombre del cliente es requerido',
            'website.required' => 'Sitio web es requerido',
            'phone.required' => 'El número de telefono es requerido',
            'registro_fiscal.required' => 'El registro fiscal es requerido',
            'fullname.required' => 'El nombre completo es requerido',
            'lastname.required' => 'El apellido es requerido',
            'email.required' => 'El correo eléctronico es requerido',
            'phone_contact.required' => 'El número de telefono de contacto es requerido',
            'address.required' => 'Dirección es requerido',
            'postal_code.required' => 'Codigo postal es requerido',
            'country.required' => 'El país es requerido',
        ];

        $this->validate($rules, $messages);
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
         'address' => $this->address,
         'postal_code' => $this->postal_code,
         'country' => $this->country
        ]);
         $this->resetUI();
        $this->emit('scan-ok', 'Cliente Actualizado');
    }

    protected $listeners = [
        'deleteRow' => 'Destroy',
    ];

    public function Destroy(Customers $customer)
    {
        $customer->delete();
        this->resetUI();
        $this->emit('scan-ok', 'Cliente Eliminado');
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
        $this->address= '';
        $this->postal_code= '';
        $this->country= '';
    }
}
