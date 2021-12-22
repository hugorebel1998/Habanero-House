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

        Permission::create(['name' => 'create covertura']);
        Permission::create(['name' => 'read covertura']);
        Permission::create(['name' => 'update covertura']);
        Permission::create(['name' => 'delete covertura']);

        Permission::create(['name' => 'create configuracion']);
        Permission::create(['name' => 'read configuracion']);
        Permission::create(['name' => 'update configuracion']);
        Permission::create(['name' => 'delete configuracion']);


        $role = Role::create(['name' => 'admin']);
        //Permiso usuario
        $role->givePermissionTo('create usuario');
        $role->givePermissionTo('read usuario');
        $role->givePermissionTo('update usuario');
        $role->givePermissionTo('delete usuario');
        //Permiso Producto
        $role->givePermissionTo('create producto');
        $role->givePermissionTo('read producto');
        $role->givePermissionTo('update producto');
        $role->givePermissionTo('delete producto');
        //Permiso Categoria
        $role->givePermissionTo('create categoria');
        $role->givePermissionTo('read categoria');
        $role->givePermissionTo('update categoria');
        $role->givePermissionTo('delete categoria');
        //Permiso Covertura
        $role->givePermissionTo('create covertura');
        $role->givePermissionTo('read covertura');
        $role->givePermissionTo('update covertura');
        $role->givePermissionTo('delete covertura');
        //Permiso Configuración
        $role->givePermissionTo('create configuracion');
        $role->givePermissionTo('read configuracion');
        $role->givePermissionTo('update configuracion');
        $role->givePermissionTo('delete configuracion');


        $role = Role::create(['name' => 'gerente']);
        //Permiso Usuario
        $role->givePermissionTo('read usuario');
        //Permiso Producto
        $role->givePermissionTo('create producto');
        $role->givePermissionTo('read producto');
        $role->givePermissionTo('update producto');
        //Permiso Categoria
        $role->givePermissionTo('create categoria');
        $role->givePermissionTo('read categoria');
        $role->givePermissionTo('update categoria');
        //Permiso Covertura
        $role->givePermissionTo('create covertura');
        $role->givePermissionTo('read covertura');
        $role->givePermissionTo('update covertura');
        //Permiso Configuración
        $role->givePermissionTo('read configuracion');


        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());

        
    }
}
