<?php

use App\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
        Setting::create([
            'nombre_razon_social' => 'Habanero House',
            'nombre_encargado' => 'Hugo Guillermo',
            'telefono_razon_social' => '5570246551',
            'direccion_razon_social' => 'Sindicato Nacional de Electricistas 16, Hab Electra, 54060 Tlalnepantla de Baz, Méx',
            'email_razon_social' => 'habanero@habanero.com'
        ]);
    }
}
