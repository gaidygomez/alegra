<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('meals')->delete();

        $meals = [
            [
                'name' => 'Bandeja Paisa',
                'status' => 1,
                'recipe' => json_encode([
                    'rice' => 1, 
                    'meat' => 1, 
                    'potato' => 1, 
                    'tomato' => 1, 
                    'onion' => 1
                ]),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Ajiaco',
                'status' => 1,
                'recipe' => json_encode([
                    'chicken' => 1, 
                    'potato' => 1, 
                    'onion' => 1
                ]),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Mamona',
                'status' => 1,
                'recipe' => json_encode([
                    'meat' => 1, 
                    'potato' => 1, 
                    'tomato' => 1, 
                    'onion' => 1
                ]),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Sancocho',
                'status' => 1,
                'recipe' => json_encode([
                    'meat' => 1, 
                    'potato' => 1, 
                    'onion' => 1,
                    'lemon' => 1
                ]),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Arepa',
                'status' => 1,
                'recipe' => json_encode([
                    'cheese' => 1
                ]),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Perro Caliente',
                'status' => 1,
                'recipe' => json_encode([
                    'ketchup' => 1,
                    'lettuce' => 1,
                    'tomato' => 1
                ]),
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        DB::table('meals')->insert($meals);
    }
}
