<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Analista']);

        Permission::create(['name' => 'clientes.index',
        'description' => 'Administrar clientes'])->syncRoles([$role1]);

        Permission::create(['name' => 'usuarios.index',
        'description' => 'Administrar usuarios'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.roles',
        'description' => 'Administrar roles y permisos'])->syncRoles([$role1]);

        Permission::create(['name' => 'suplidores.index',
        'description' => 'Administrar suplidores'])->syncRoles([$role1]);

        Permission::create(['name' => 'ronurados.index',
        'description' => 'Administrar tipos de ranurados'])->syncRoles([$role1]);

        Permission::create(['name' => 'orden_produccion.index',
        'description' => 'Administrar ordenes de producción'])->syncRoles([$role1,$role2]);

        Permission::create(['name' => 'reporte.index',
        'description' => 'Generar reportes'])->syncRoles([$role1,$role2]);

        Permission::create(['name' => 'cambiar_contrasena',
        'description' => 'Cambiar contraseña'])->syncRoles([$role1,$role2]);

        Permission::create(['name' => 'almacenes.index',
        'description' => 'Administrar almacen'])->syncRoles([$role1]);

        Permission::create(['name' => 'registro.fases',
        'description' => 'Registro de fases'])->syncRoles([$role2]);

        Permission::create(['name' => 'admin.general',
        'description' => 'Administración general del sistema'])->syncRoles([$role1]);

       
    }
}
