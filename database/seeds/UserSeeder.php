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
            'cargo'    => 'Super Administrador',
            'email'    => 'superadministrador@habanero.com',
            'password' => bcrypt('12345678'),
            'permiso'  => '1'
        ]);

        $superadmin->assignRole('super-admin');


        $administrador = User::create([
            'cargo'     => 'Administrador',
            'email'    => 'administrador@habanero.com',
            'password' => bcrypt('12345678'),
            'permiso'  => '2'
        ]);

        $administrador->assignRole('admin');



        $gerente = User::create([
            'cargo'     => 'Gerente',
            'email'    => 'gerente@habanero.com',
            'password' => bcrypt('12345678'),
            'permiso'  => '3'
        ]);

        $gerente ->assignRole('gerente');

    }
}
