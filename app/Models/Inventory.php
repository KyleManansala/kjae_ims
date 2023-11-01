<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Category;

class Inventory extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    protected $fillable = [
        'category_id',
        'product_name', 
        'product_quantity', 
        'price',
    ];

    protected $hidden = [
        // 'category_id',
    ];

    protected $casts = [];
}
