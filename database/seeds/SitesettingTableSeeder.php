<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SitesettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sitesetting')->insert([
            'id' => 1,
            'phone_one' => 0300000000,
            'phone_two' => 0600000000,
            'email' => 'test@gmail.com',
            'company_name' => 'テストショップ',
            'company_address' => '東京',
            'facebook' => 'Facebook',
            'youtube' => 'Youtube',
            'instagram' => 'Instagram',
            'twitter' => 'Twitter',
            'created_at' => '2021/01/01 11:11:11'
        ]);
    }
}
