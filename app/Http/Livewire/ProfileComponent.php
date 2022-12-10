<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class ProfileComponent extends Component
{
    public function render()
    {
        return view('livewire.profile.component')
            ->extends('layouts.theme.app')
            ->section('content');
    }
}
