<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'product_id';
    
    protected $fillable = ['product_name', 'product_quantity', 'price'];

    // Define relationships, if any
    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id', 'category_id');
    }
}

