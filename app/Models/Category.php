<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Inventory;

class Category extends Model
{
    use HasFactory;

    // Define relationships, if any
    public function inventory()
    {
        return $this->hasMany(Inventory::class, 'category_id', 'category_id');
    }

    protected $fillable = [
        "category_name",
    ];
    protected $hidden = [];
    protected $casts = [];
}
