<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->insert([
            'id' => 1,
            'name' => 'Food',
            'description' => 'Food related items and services for sale in the market.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'id' => 2,
            'name' => 'Beverage',
            'description' => 'Beverage related items and services for sale in the market.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'id' => 3,
            'name' => 'Clothing',
            'description' => 'Clothing related items and services for sale in the market.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'id' => 4,
            'name' => 'Electronics',
            'description' => 'Electronics related items and services for sale in the market.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'id' => 5,
            'name' => 'Furniture',
            'description' => 'Furniture related items and services for sale in the market.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('categories')->insert([
            'id' => 6,
            'name' => 'Others',
            'description' => 'Other items and services for sale in the market.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
