<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'id' => 1,
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password123'),
            'category' => '1',
            'coupon' => '1',
            'product' => '1',
            'blog' => '1',
            'order' => '1',
            'other' => '1',
            'report' => '1',
            'role' => '1',
            'return' => '1',
            'contact' => '1',            
            'comment' => '1',
            'setting' => '1',
            'stock' => '1',
            'type' => '1',
            'created_at' => '2021/01/01 11:11:11'
        ]);
    }
}
