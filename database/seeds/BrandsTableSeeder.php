<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([
            'id' => 1,
            'brand_name' => 'ここにブランド名が入ります',
            'brand_logo' => 'sample1.jpg',
            'created_at' => '2021/01/01 11:11:11'
            
        ]);
    }
}
