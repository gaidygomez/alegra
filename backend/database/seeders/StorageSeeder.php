<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StorageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('storages')->delete();

        $products = [
            [
                'name' => 'tomato',
                'status' => 1,
                'quantity' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'lemon',
                'status' => 1,
                'quantity' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'potato',
                'status' => 1,
                'quantity' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'rice',
                'status' => 1,
                'quantity' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'ketchup',
                'status' => 1,
                'quantity' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'lettuce',
                'status' => 1,
                'quantity' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'onion',
                'status' => 1,
                'quantity' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'cheese',
                'status' => 1,
                'quantity' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'meat',
                'status' => 1,
                'quantity' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'chicken',
                'status' => 1,
                'quantity' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        DB::table('storages')->insert($products);
    }
}
