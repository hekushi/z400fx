<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AdminsTableSeeder::class,
            BrandsTableSeeder::class,
            //CategoriesTableSeeder::class,
            ProductsTableSeeder::class,
            SettingsTableSeeder::class,
            SitesettingTableSeeder::class,
            UsersTableSeeder::class,
        ]);
    }
}
