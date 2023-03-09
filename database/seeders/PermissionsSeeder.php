<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

            //Create, Update and Delete Courses
            Permission::create(['name' => 'create course']);
            Permission::create(['name' => 'update course']);
            Permission::create(['name' => 'delete course']);
            
            //Create, Update and Delete Exercices
            Permission::create(['name' => 'create exercices']);
            Permission::create(['name' => 'update exercices']);
            Permission::create(['name' => 'delete exercices']);
    
            //Create, Update and Delete Users
            Permission::create(['name' => 'create user']);
            Permission::create(['name' => 'update user']);
            Permission::create(['name' => 'delete user']);

            //Create, Update and Delete Admins
            Permission::create(['name' => 'create admin']);
            Permission::create(['name' => 'update admin']);
            Permission::create(['name' => 'delete admin']);
            

            //User Permissions
            $role1 = Role::create(['name' => 'user']);
           
    
            //Admin Permissions
            $role2 = Role::create(['name' => 'admin']);
            //Courses Permissions to ADMIN
            $role2->givePermissionTo('create course');
            $role2->givePermissionTo('update course');
            $role2->givePermissionTo('delete course');
            //Exercices Permissions to ADMIN
            $role2->givePermissionTo('create exercices');
            $role2->givePermissionTo('update exercices');
            $role2->givePermissionTo('delete exercices');
            //Users Permissions to ADMIN
            $role2->givePermissionTo('create user');
            $role2->givePermissionTo('update user');
            $role2->givePermissionTo('delete user');

            //Super-Admin Permisions
            $role3 = Role::create(['name' => 'Super-Admin']);
            //Courses Permissions to SUPER-ADMIN
            $role2->givePermissionTo('create course');
            $role2->givePermissionTo('update course');
            $role2->givePermissionTo('delete course');
            //Exercices Permissions to SUPER-ADMIN
            $role2->givePermissionTo('create exercices');
            $role2->givePermissionTo('update exercices');
            $role2->givePermissionTo('delete exercices');
            //Users Permissions to ADMIN
            $role2->givePermissionTo('create user');
            $role2->givePermissionTo('update user');
            $role2->givePermissionTo('delete user');
            //Admin Permissions to SUPER-ADMIN
            $role2->givePermissionTo('create admin');
            $role2->givePermissionTo('update admin');
            $role2->givePermissionTo('delete admin');
    
    
            //USER
            $user = \App\Models\User::factory()->create([
                'name' => 'User',
                'email' => 'test@example.com',
            ]);
            $user->assignRole($role1);
    
            //ADMIN
            $user = \App\Models\User::factory()->create([
                'name' => 'Example Admin User',
                'email' => 'admin@example.com',
                // 'password' => Hash::make('factoria'),
            ]);
            $user->assignRole($role2);
    
            //SUPER-ADMIN
            $user = \App\Models\User::factory()->create([
                'name' => 'Example Super-Admin User',
                'email' => 'superadmin@example.com',
            ]);
            $user->assignRole($role3);

    }
}
