<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::insert([
            [
                'id' => 1,
                'name' => 'Аптека и здоровье',
                'slug' => 'health',
            ],
            [
                'id' => 2,
                'name' => 'Красота и уход',
                'slug' => 'beatiful',
            ],
            [
                'id' => 3,
                'name' => 'Средства для дома',
                'slug' => 'home',
            ],
        ]);
        Product::factory(15)->create();

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
