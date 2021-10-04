<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()['cache']->forget('spatie.permission.cache');

        Permission::create(['name' => 'create user']);
        Permission::create(['name' => 'read users']);
        Permission::create(['name' => 'update user']);
        Permission::create(['name' => 'delete user']);


        // $role = Role::create(['name' => 'admin']);
        // $role->givePermissionTo('create empleado');
        // $role->givePermissionTo('read empleado');
        // $role->givePermissionTo('update empleado');
        // $role->givePermissionTo('delete empleado');

        // $role = Role::create(['name' => 'sucursal']);
        // $role->givePermissionTo('create empleado');
        // $role->givePermissionTo('read empleado');
        // $role->givePermissionTo('update empleado');
        // $role->givePermissionTo('delete empleado');


        // $role = Role::create(['name' => 'laboratorio']);
        // $role->givePermissionTo('nivel empleado');
        // $role->givePermissionTo('create user');
        // $role->givePermissionTo('read users');
        // $role->givePermissionTo('update user');
        // $role->givePermissionTo('delete user');



        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());

        
    }
}
