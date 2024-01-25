<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'id'; // LLave primaria
    protected $fillable = ['name_product', // Producto
    'unitarie_price']; // Precio unitario

}