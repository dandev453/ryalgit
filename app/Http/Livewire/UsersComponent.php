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
    public $search, $name, $email, $password, $profile, $phone, $status, $image;
    use WithFileUploads, WithPagination;

   public function mount()
    {
        $this->pageTitle = 'Listado';
        $this->role = 'Elegir';
        $this->componentName = "Añadir usuario";

    }
    public function paginationView()
    {
        return 'vendor.livewire.admin-lte';
    }
    public function render()
    {
         if(strlen($this->search) > 0)
            $users = User::where('name', 'like', '%' . $this->search . '%')->paginate($this->pagination);
        else
            $users = User::orderBy('name', 'asc')->paginate($this->pagination);
        return view('livewire.users.component',[
            'data' =>  $users
         ])->extends('layouts.theme.app')
            ->section('content');
    }
     
         
}
