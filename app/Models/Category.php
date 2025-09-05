<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['nom'];

    public function Produit()
    {

        return $this->hasMany(Product::class);
    }
}
