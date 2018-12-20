<?php

use Illuminate\Database\Seeder;

class BloodgroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Blood', 10)->create();
    }
}
