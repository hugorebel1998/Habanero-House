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
            'nombre_encargado'=> 'Hugo Guillermo',
            'nombre_razon_social' => 'Habanero House',
            'telefono_razon_social' => '5570246551',
            'email_razon_social' => 'habanero@habanero.com',
            'direccion_razon_social' => 'Sindicato Nacional de Electricistas 16, Hab Electra, 54060 Tlalnepantla de Baz, Méx',
            'whatsapp' => '5514944025',
            'facebook' => 'https://www.facebook.com/search/top?q=habanero%20house%20autentica%20comida%20yucateca',
            'instagram' => 'https://www.instagram.com/habanero_house_oficial/?hl=es-la',
        ]);
    }
}
