<?php

use App\TagCategory;
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
        $this->call([UsersTableSeeder::class,
                     TagCategoriesTableSeeder::class,
                     ProductsTableSeeder::class,
                     ContactsTableSeeder::class
        ]);
    }
}
