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
            'name' => 'Cheetos',
            'owner_id' => 1,
            'description' => 'Cheetos are a snack food made from potato chips, a type of potato, and a snack food manufactured by the American company General Mills. The name is derived from the word cheetah, which means "cheetah" in English. Cheetos are sold in many countries, including the United States, Canada, Australia, New Zealand, and the United Kingdom.',
            'price' => 10000,
            'stock' => 1000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'category_id' => 1,
            'name' => 'Snickers',
            'owner_id' => 1,
            'description' => 'Snickers is a brand of Mars snack bar and candy manufactured by The Coca-Cola Company. It is sold in the United States, Canada, Australia, New Zealand, and the United Kingdom.',
            'price' => 15000,
            'stock' => 1000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'category_id' => 2,
            'name' => 'Coca Cola',
            'owner_id' => 1,
            'description' => 'Coca-Cola is a carbonated soft drink manufactured by The Coca-Cola Company. It is sold in the United States, Canada, Australia, New Zealand, and the United Kingdom.',
            'price' => 20000,
            'stock' => 1000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'category_id' => 2,
            'name' => 'Pepsi',
            'owner_id' => 1,
            'description' => 'Pepsi is a carbonated soft drink manufactured by The PepsiCo Company. It is sold in the United States, Canada, Australia, New Zealand, and the United Kingdom.',
            'price' => 25000,
            'stock' => 1000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'category_id' => 3,
            'name' => 'Coffee',
            'owner_id' => 1,
            'description' => 'Coffee is a brewed drink prepared from roasted coffee beans, which are the seeds of berries from the Coffea plant. The genus Coffea is native to tropical Africa and Madagascar, and is cultivated in many countries around the world.',
            'price' => 30000,
            'stock' => 1000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'category_id' => 3,
            'name' => 'Tea',
            'owner_id' => 1,
            'description' => 'Tea is a brewed drink prepared from Camellia sinensis, a species of Camellia plant. It is used for flavoring beverages and cooking.',
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
            'name' => 'Ikea Chair',
            'owner_id' => 1,
            'description' => 'Ikea is a brand of furniture and home furnishings made by the Swedish company Ikea. It is sold in the United States, Canada, Australia, New Zealand, and the United Kingdom.',
            'price' => 90000,
            'stock' => 1000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'category_id' => 5,
            'name' => 'Ikea Table',
            'owner_id' => 1,
            'description' => 'Ikea is a brand of furniture and home furnishings made by the Swedish company Ikea. It is sold in the United States, Canada, Australia, New Zealand, and the United Kingdom.',
            'price' => 100000,
            'stock' => 1000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'category_id' => 5,
            'name' => 'Ikea Bed',
            'owner_id' => 1,
            'description' => 'Ikea is a brand of furniture and home furnishings made by the Swedish company Ikea. It is sold in the United States, Canada, Australia, New Zealand, and the United Kingdom.',
            'price' => 110000,
            'stock' => 1000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'category_id' => 6,
            'name' => 'Rinso',
            'owner_id' => 1,
            'description' => 'Rinso is a brand of cleaning products made by the Japanese company Rinnai. It is sold in the United States, Canada, Australia, New Zealand, and the United Kingdom.',
            'price' => 120000,
            'stock' => 1000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

    }
}
