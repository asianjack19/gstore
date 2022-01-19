<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use DB;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
            'category_id' => 1,
            'name' => 'The Art of Computer Programming',
            'owner_id' => 1,
            'description' => 'The Art of Computer Programming is a series of books that teach the fundamentals of computer programming. The books are written by the well-known computer scientist Donald Knuth.',
            'price' => 10000,
            'stock' => 1000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'category_id' => 1,
            'name' => 'The C Programming Language',
            'owner_id' => 1,
            'description' => 'The C Programming Language is a series of books that teach the fundamentals of computer programming. The books are written by the well-known computer scientist Donald Knuth.',
            'price' => 15000,
            'stock' => 1000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'category_id' => 1,
            'name' => 'History of Western Philosophy',
            'owner_id' => 1,
            'description' => 'History of Western Philosophy is a series of books that teach the fundamentals of computer programming. The books are written by the well-known computer scientist Donald Knuth.',
            'price' => 20000,
            'stock' => 1000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'category_id' => 2,
            'name' => 'Pencil',
            'owner_id' => 1,
            'description' => 'Pencil',
            'price' => 25000,
            'stock' => 1000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'category_id' => 2,
            'name' => 'Erasers',
            'owner_id' => 1,
            'description' => 'Erasers',
            'price' => 30000,
            'stock' => 1000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'category_id' => 3,
            'name' => 'T-shirt',
            'owner_id' => 1,
            'description' => 'T-shirt',
            'price' => 35000,
            'stock' => 1000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('products')->insert([
            'category_id' => 3,
            'name' => 'Gucci Bag',
            'owner_id' => 1,
            'description' => 'Gucci is a brand of clothing and accessories manufactured by Gucci. It is sold in the United States, Canada, Australia, New Zealand, and the United Kingdom.',
            'price' => 40000,
            'stock' => 1000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'category_id' => 3,
            'name' => 'Nike Shoes',
            'owner_id' => 1,
            'description' => 'Nike is a brand of footwear, clothing, and equipment made by the multinational corporation Nike, Inc. It is sold in the United States, Canada, Australia, New Zealand, and the United Kingdom.',
            'price' => 45000,
            'stock' => 1000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'category_id' => 3,
            'name' => 'Adidas Shoes',
            'owner_id' => 1,
            'description' => 'Adidas is a brand of footwear, clothing, and equipment made by the multinational corporation Adidas AG. It is sold in the United States, Canada, Australia, New Zealand, and the United Kingdom.',
            'price' => 50000,
            'stock' => 1000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'category_id' => 4,
            'name' => 'Samsung Galaxy S10',
            'owner_id' => 1,
            'description' => 'Samsung Galaxy S10 is a smartphone manufactured by Samsung Electronics. It is the tenth generation of the Samsung Galaxy smartphone line, and the first smartphone to feature a notch.',
            'price' => 60000,
            'stock' => 1000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'category_id' => 4,
            'name' => 'Samsung Galaxy S20',
            'owner_id' => 1,
            'description' => 'Samsung Galaxy S20 is a smartphone manufactured by Samsung Electronics. It is the eleventh generation of the Samsung Galaxy smartphone line, and the first smartphone to feature a notch.',
            'price' => 70000,
            'stock' => 1000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'category_id' => 4,
            'name' => 'Iphone X',
            'owner_id' => 1,
            'description' => 'Iphone X is a smartphone manufactured by Apple Inc. It is the tenth generation of the iPhone smartphone line, and the first smartphone to feature a notch.',
            'price' => 80000,
            'stock' => 1000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'category_id' => 5,
            'name' => 'Logitech G502',
            'owner_id' => 1,
            'description' => 'Logitech G502 is a gaming mouse manufactured by Logitech. It is the first gaming mouse to be sold in the United States.',
            'price' => 90000,
            'stock' => 1000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'category_id' => 5,
            'name' => 'VortexSeries Keyboard',
            'owner_id' => 1,
            'description' => 'VortexSeries Keyboard is a gaming keyboard manufactured by Vortex Series in Indonesia. It is the first Indonesian gaming keyboard to be sold in the United States.',
            'price' => 100000,
            'stock' => 1000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'category_id' => 5,
            'name' => 'Rubik\'s Cube',
            'owner_id' => 1,
            'description' => 'Rubik\'s Cube is a toy made by the company Rubik. It is the first toy to be sold in the United States.',
            'price' => 110000,
            'stock' => 1000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'category_id' => 5,
            'name' => 'Nintendo Switch',
            'owner_id' => 1,
            'description' => 'Nintendo Switch is a video game console manufactured by Nintendo. It is the first video game console to be sold in the United States.',
            'price' => 120000,
            'stock' => 1000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'category_id' => 5,
            'name' => 'Nintendo Switch Lite',
            'owner_id' => 1,
            'description' => 'Nintendo Switch Lite is a video game console manufactured by Nintendo. It is the first video game console to be sold in the United States.',
            'price' => 130000,
            'stock' => 1000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'category_id' => 5,
            'name' => 'PlayStation 5',
            'owner_id' => 1,
            'description' => 'PlayStation 5 is a video game console manufactured by Sony Interactive Entertainment. It is the first video game console to be sold in the United States.',
            'price' => 140000,
            'stock' => 1000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
