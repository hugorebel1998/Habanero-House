<?php

use App\Restaurant;
use Illuminate\Database\Seeder;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Restaurant::create([
            'nombre_razon_social' => 'Habanero House',
            'telefono_razon_social' => '5570246551',

        ]);
    }
}
