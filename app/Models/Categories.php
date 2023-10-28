<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'category_id';
    public $timestamps = false; // If you don't have timestamps in your table

    // Define relationships, if any
    public function products()
    {
        return $this->hasMany(Products::class, 'category_id', 'category_id');
    }
}
