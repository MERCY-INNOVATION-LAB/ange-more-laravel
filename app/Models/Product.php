<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products'; 

    protected $fillable=['nom','description','prix','quantite','category_id'];

    public function shop()
    {
        return $this->belongsTo(Shop::class, 'shop_id');
    }
}
