<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Halo 5',
            'slug' => 'halo-5',
            'category_id' => '1',
            'category' => 'Xbox One',
            'description' => "Halo 5: Guardians sur Xbox One est un FPS mettant en scène les aventures du Master Chief et d'un nouveau personnage, le Spartan Jameson Locke. ",
            'releaseDate' => '27 octobre 2015',
            'price' => '54.99'

        ]);
    }
}
