<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UsersComponent extends Component
{
    private $pagination = 10;
    public $search, $selected_id, $user, $status, $name, $email, $profile, $password, $image, $pageTitle, $componentName;
    use WithFileUploads, WithPagination;

    public function mount()
    {
        $this->pageTitle = 'Listado';
        $this->role = 'Elegir';
        $this->componentName = 'Añadir usuario';
    }
    public function paginationView()
    {
        return 'vendor.livewire.admin-lte';
    }
    public function render()
    {
        if (strlen($this->search) > 0) {
            $users = User::where('name', 'like', '%' . $this->search . '%')->paginate($this->pagination);
        } else {
            $users = User::orderBy('name', 'asc')->paginate($this->pagination);
        }
        return view('livewire.users.component', [
            'data' => $users,
        ])
            ->extends('layouts.theme.app')
            ->section('content');
    }
    public function Edit(User $user)
    {
        $this->selected_id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->profile = $user->profile;
        $this->status = $user->status;
        $this->emit('show-modal', 'Show modal');
    }
    public function Update()
    {
        $rules = [
            'name' => "required|min:3|unique:products,name,{$this->selected_id}",
            'email' => 'required',
            'profile' => 'required',
            'status' => 'required',
        ];
        $messages = [
            'name.required' => 'Nombre del producto es requerido',
            'email.unique' => 'Ya existe el correo eléctronico',
            'name.min' => 'El nombre del producto debe tener al menos 3 caracteres.',
            'profile.required' => 'El rol es requerido',
            'status.required' => 'El rol es requerido',
        ];

        $this->validate($rules, $messages);

        $user = User::find($this->selected_id);

        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'profile' => $this->profile,
            'status' => $this->status,
        ]);

        if ($this->image) {
            $customFileName = uniqid() . '_.' . $this->image->extension();
            $this->image->storeAs('/public/users', $customFileName);
            $imageTemp = $product->image; //imagen temporal
            $user->image = $customFileName;
            $user->save();

            if ($imageTemp != null) {
                if (file_exists('storage/users/' . $imageTemp)) {
                    unlink('storage/users/' . $imageTemp);
                }
            }
        }
        $this->resetUI();
        $this->emit('user-updated', 'Usuario Actualizado');
    }
    public function resetUI()
    {
        $this->name = '';
        $this->email = '';
        $this->profile = '';
        $this->status = '';
    }
    protected $listeners = ['deleteRow' => 'Destroy'];
    public function Destroy(User $user)
    {
        $imageTemp = $user->image;
        $user->delete();

        if ($imageTemp != null) {
            if (file_exists('storage/users/' . $imageTemp)) {
                unlink('storage/users/' . $imageTemp);
            }
        }

        $this->resetUI();
        $this->emit('user-deleted', 'Usuario Eliminado');
    }
}
