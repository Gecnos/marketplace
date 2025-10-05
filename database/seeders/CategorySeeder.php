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
        $categories = [
            ['name' => 'Plomberie'],
            ['name' => 'Électricité'],
            ['name' => 'Jardinage'],
            ['name' => 'Peinture'],
            ['name' => 'Maçonnerie'],
            ['name' => 'Menuiserie'],
            ['name' => 'Nettoyage'],
            ['name' => 'Déménagement'],
            ['name' => 'Informatique'],
            ['name' => 'Autre'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}