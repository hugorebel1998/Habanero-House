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

        Permission::create(['name' => 'create usuario']);
        Permission::create(['name' => 'read usuario']);
        Permission::create(['name' => 'update usuario']);
        Permission::create(['name' => 'delete usuario']);

        Permission::create(['name' => 'create producto']);
        Permission::create(['name' => 'read producto']);
        Permission::create(['name' => 'update producto']);
        Permission::create(['name' => 'delete producto']);


        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo('create usuario');
        $role->givePermissionTo('read usuario');
        $role->givePermissionTo('update usuario');
        // $role->givePermissionTo('delete usuario');
        $role->givePermissionTo('create producto');
        $role->givePermissionTo('read producto');
        $role->givePermissionTo('update producto');
        // $role->givePermissionTo('delete producto');

        $role = Role::create(['name' => 'gerente']);
        // $role->givePermissionTo('create usuario');
        $role->givePermissionTo('read usuario');
        // $role->givePermissionTo('update usuario');
        $role->givePermissionTo('create producto');
        $role->givePermissionTo('read producto');
        $role->givePermissionTo('update producto');


        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());

        
    }
}
