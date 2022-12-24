<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name', 'website', 'phone', 'registro_fiscal', 'fullname', 'lastname', 'email', 'phone_contact', 'address', 'postal_code', 'country', 'created_at'];
}
