<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //ini dalam databasenya ke migrations 2025
    use HasFactory;

    protected $fillable=['title','deskripsi','price','stock',];
}
