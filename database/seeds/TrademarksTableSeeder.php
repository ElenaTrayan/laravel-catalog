<?php

use Illuminate\Database\Seeder;

class TrademarksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\Trademark', 100)->create();
    }
}
