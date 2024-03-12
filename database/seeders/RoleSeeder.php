<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $role1 = Role::create(['name'=>'Product Owner']);
        $role2 =Role::create(['name'=>'Scrum Master']);
        $role3 = Role::create(['name'=>'Developers']);



         //Permisos de usuario(tabla usuario)
       $permission = Permission::create(['name' => 'users.index','description'=> 'Ver listado de usuarios'])->syncRoles([$role1, $role2]);    
       $permission = Permission::create(['name' => 'users.edit','description'=> 'Asignar un rol'])->syncRoles([$role1]);
       $permission = Permission::create(['name' => 'users.update','description'=> 'Actualizar rol'])->syncRoles([$role1]);
       $permission = Permission::create(['name' => 'users.destroy','description'=> 'Eliminar rol'])->syncRoles([$role1]);
       $permission = Permission::create(['name' => 'users.create','description'=> 'Crear un usuario'])->syncRoles([$role1]);    


       //Permisos a la tabla definicion
       $permission = Permission::create(['name' => 'definiciones.index','description'=> 'Ver listado de definiciones'])->syncRoles([$role1, $role2, $role3]); 
       $permission = Permission::create(['name' => 'definiciones.create','description'=> 'Crear una definiciones'])->syncRoles([$role1]);       
       $permission = Permission::create(['name' => 'definiciones.edit','description'=> 'Editar definiciones'])->syncRoles([$role1, $role2]);
       $permission = Permission::create(['name' => 'definiciones.update','description'=> 'Actualizar Definiciones'])->syncRoles([$role1, $role2]);
       $permission = Permission::create(['name' => 'definiciones.destroy','description'=> 'Eliminar Definiciones'])->syncRoles([$role1, $role2]);
      
       //tabla de roles
       $permission = Permission::create(['name' => 'roles.index','description'=> 'Ver listado de roles'])->syncRoles([$role1, $role2]); 
       $permission = Permission::create(['name' => 'roles.create','description'=> 'Crear un nuevo rol'])->syncRoles([$role1]);       
       $permission = Permission::create(['name' => 'roles.edit','description'=> 'Editar rol'])->syncRoles([$role1]);
       $permission = Permission::create(['name' => 'roles.update','description'=> 'Actualizar rol'])->syncRoles([$role1]);
       $permission = Permission::create(['name' => 'roles.destroy','description'=> 'Eliminar rol'])->syncRoles([$role1]);

        //tabla de product backlog
       $permission = Permission::create(['name' => 'productbackloges.index','description'=> 'Ver listado de product backlog'])->syncRoles([$role1, $role2]); 
       $permission = Permission::create(['name' => 'productbackloges.create','description'=> 'Crear un nuevo campo backlog'])->syncRoles([$role1]);       
       $permission = Permission::create(['name' => 'productbackloges.edit','description'=> 'Editar campo product backlog'])->syncRoles([$role1]);
       $permission = Permission::create(['name' => 'productbackloges.update','description'=> 'Actualizar product backlog'])->syncRoles([$role1]);
       $permission = Permission::create(['name' => 'productbackloges.destroy','description'=> 'Eliminar campo product backlog'])->syncRoles([$role1]);

       //Tabla de historia de usuarios
       $permission = Permission::create(['name' => 'historiausuarios.index','description'=> 'Ver listado de historia de usuarios'])->syncRoles([$role1, $role2]); 
       $permission = Permission::create(['name' => 'historiausuarios.create','description'=> 'Crear una historia de usuario'])->syncRoles([$role1]);       
       $permission = Permission::create(['name' => 'historiausuarios.edit','description'=> 'Editar una historia de usuario'])->syncRoles([$role1]);
       $permission = Permission::create(['name' => 'historiausuarios.update','description'=> 'Actualizar una historia de usuario'])->syncRoles([$role1]);
       $permission = Permission::create(['name' => 'historiausuarios.destroy','description'=> 'Eliminar una historia de usuario'])->syncRoles([$role1]);
      
        //Tabla de Sprint Backlog
        $permission = Permission::create(['name' => 'sprintbackloges.index','description'=> 'Ver listado de sprint backlog'])->syncRoles([$role1, $role2]); 
       $permission = Permission::create(['name' => 'sprintbackloges.create','description'=> 'Crear un sprint backlog'])->syncRoles([$role1]);       
       $permission = Permission::create(['name' => 'sprintbackloges.edit','description'=> 'Editar un sprint backlog'])->syncRoles([$role1]);
       $permission = Permission::create(['name' => 'sprintbackloges.update','description'=> 'Actualizar un sprint backlog'])->syncRoles([$role1]);
       $permission = Permission::create(['name' => 'sprintbackloges.destroy','description'=> 'Eliminar un sprint backlog'])->syncRoles([$role1]);
       $permission = Permission::create(['name' => 'sprintbackloges.show','description'=> 'Ver tareas del sprint'])->syncRoles([$role1]);

      
      
      }
}
