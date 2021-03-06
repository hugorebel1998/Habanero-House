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
            'rol'              => 'Super Administrador',
            'name'             => 'Hugo',
            'apellido_paterno' => 'Guillermo',
            'email'            => 'superadministrador@habanero.com',
            'password'         => bcrypt('12345678'),
            'permiso'          => '1'
        ]);

        $superadmin->assignRole('super-admin');


        $administrador = User::create([
            'rol'              => 'Administrador',
            'name'             => 'Juan Pablo',
            'apellido_paterno' => 'Guillermo',
            'email'            => 'administrador@habanero.com',
            'password'         => bcrypt('12345678'),
            'permiso'          => '2'
        ]);

        $administrador->assignRole('admin');



        $gerente = User::create([
            'rol'              => 'Gerente',
            'name'             => 'Jose Luis',
            'apellido_paterno' => 'Guillermo',
            'email'            => 'gerente@habanero.com',
            'password'         => bcrypt('12345678'),
            'permiso'          => '3'
        ]);

        $gerente ->assignRole('gerente');

    }
}
