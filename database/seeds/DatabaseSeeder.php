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
        factory(\App\User::class, 50)->create();
        factory(\App\Category::class, 15)->create();
        factory(\App\Meal::class, 50)->create();
        factory(\App\Order::class, 75)->create();
        factory(\App\OrderContent::class, 100)->create();
    }
}
