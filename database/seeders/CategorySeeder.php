<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // run seeder to automatically insert initial records on migration
        
        $categories = [
            'Insecticides/Fungicides/Pesticides', 
            'Fertilizers/Granulars', 
            'Feeds (Dog/Cat Foods)', 
            'Certified Seeds', 
            'Veterinary Medicines', 
            'Rice', 'Agri-Machineries/ Spare Parts', 
            'Other Farm/Poultry Equipments',
        ];

        foreach ($categories as $value) {
            Category::create(["category_name" => $value]);
        }        
    }
}
