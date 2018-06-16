<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // Disable all mass assignment restrictions
        Model::unguard();

        $this->call([
//            DiscountsTableSeeder::class,
//            SuppliersTableSeeder::class,
//            TrademarksTableSeeder::class,
            ProductsTableSeeder::class,
//            UsersTableSeeder::class,
        ]);

        // Re enable all mass assignment restrictions
        Model::reguard();
    }
}
