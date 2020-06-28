<?php

use Illuminate\Database\Seeder;
use App\Buy;

class BuysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Buy::class, 100)->create();
    }
}
