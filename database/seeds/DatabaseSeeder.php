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
        $this->call(RestaurantSeeder::class);
        $this->call(UserStatusSeeder::class);
        $this->call(RolesSeeder:: class);
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
    }
}
