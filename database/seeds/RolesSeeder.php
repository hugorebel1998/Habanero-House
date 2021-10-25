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

        Permission::create(['name' => 'create categoria']);
        Permission::create(['name' => 'read categoria']);
        Permission::create(['name' => 'update categoria']);
        Permission::create(['name' => 'delete categoria']);


        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo('create usuario');
        $role->givePermissionTo('read usuario');
        $role->givePermissionTo('update usuario');
        // $role->givePermissionTo('delete usuario');
        $role->givePermissionTo('create producto');
        $role->givePermissionTo('read producto');
        $role->givePermissionTo('update producto');
        // $role->givePermissionTo('delete producto');
        $role->givePermissionTo('create categoria');
        $role->givePermissionTo('read categoria');
        $role->givePermissionTo('update categoria');
        // $role->givePermissionTo('delete producto');

        $role = Role::create(['name' => 'gerente']);
        $role->givePermissionTo('create producto');
        $role->givePermissionTo('read producto');
        $role->givePermissionTo('update producto');
        $role->givePermissionTo('create categoria');
        $role->givePermissionTo('read categoria');
        $role->givePermissionTo('update categoria');


        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());

        
    }
}
