<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Inventory;

class Category extends Model
{
    use HasFactory;


    public function inventory()
    {
        return $this->hasMany(Inventory::class, 'category_id', 'id');
    }

    protected $fillable = [
        "category_name",
    ];
    protected $hidden = [];
    protected $casts = [];
}
