<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'website', 'phone', 'registro_fiscal','fullname','lastname','email','phone_contact','adddress','postal_code','country','created_at'];
}
