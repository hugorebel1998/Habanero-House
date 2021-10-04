<?php

use Illuminate\Database\Seeder;
use App\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     
        $superadmin = User::create([
            'name'     => 'Super Administrador',
            'email'    => 'superadministrador@habanero.com',
            'password' => bcrypt('12345678')
        ]);


        $administrador = User::create([
            'name'     => 'Administrador',
            'email'    => 'administrador@habanero.com',
            'password' => bcrypt('12345678')
        ]);


        $gerente = User::create([
            'name'     => 'Gerente',
            'email'    => 'gerente@habanero.com',
            'password' => bcrypt('12345678')
        ]);

    }
}
