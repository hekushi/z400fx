<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'id' => 1,
            'category_id' => 1,
            'product_name' => 'テスト商品',
            'product_code' => 'テストコード',
            'product_quantity' => 99,
            'product_details' => 'これはテストです',
            'product_color' => 'nothing',
            'product_size' => 'nothing',
            'selling_price' => 1000,
            'image_one' => 'sample1.jpg',
            'image_two' => 'sample2.jpg',
            'image_three' => 'sample3.jpg',
            'created_at' => '2021/01/01 11:11:11'
        ]);
    }
}
