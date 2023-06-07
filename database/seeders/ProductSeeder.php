<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            'category_name' => '1',
        ]);

        $faker = Faker::create();
        foreach (range(1,100) as $item) {
            DB::table('products')->insert([
                'product_name' => 'Product ' . $item,
                'image' => '',
                'description' => $faker->text,
                'size' => rand(1,5),
                'count' => 10,
                'total_sales' => 0,
                'price' => rand(1,10)*100,
                'discount_price' => 0,
                'category_id' => 1,
                'admin_created_id' => 1,
                'admin_updated_id' => 1,
            ]);
        }
    }
}
