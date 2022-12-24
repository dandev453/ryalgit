<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\Company;



class HomeComponent extends Component
{
  use WithPagination;

  public function mount()
  {
    $this->pageTitle = 'Reportes';
    $this->componentName = 'ventas';
  }




  public function render()
  {
    return view('livewire.companies.component');
  }


  public function Store()
  {
    $rules = [
      
      ];

    $messages = [
        
    ];

    $product = Companies::create([
      'name' => $this->name,
      'register_num' => $this->register_num,
      'email' => $tihs->email,
      'phone' => $this->phone,
      'currency' => $this->currency,
      'time_zone' => $this->time_zone,
      'logo' => $this->logo,
      'address' => $this->address,
      'street' => $this->street,
      'city' => $this->city,
      'state' => $this->state,
      'country' => $this->country,
      'created_at' => $this->created_at
    ]);

    $this->validate($rules, $messages);
    $this->resetUI();
    $this->emit('product-added', 'Producto Registrado');
  }

}

