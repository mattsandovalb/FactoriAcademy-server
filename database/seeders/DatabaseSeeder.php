<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
            \App\Models\Courses::factory(3)->create();

            // \App\Models\User::factory(5)->create();
            \App\Models\exercices::factory(5)->create();

        
            app()[PermissionRegistrar::class]->forgetCachedPermissions();

            Permission::create(['name' => 'edit articles']);
            Permission::create(['name' => 'delete articles']);
            Permission::create(['name' => 'publish articles']);
            Permission::create(['name' => 'unpublish articles']);
    
            $role1 = Role::create(['name' => 'writer']);
            $role1->givePermissionTo('edit articles');
            $role1->givePermissionTo('delete articles');
    
            $role2 = Role::create(['name' => 'admin']);
            $role2->givePermissionTo('publish articles');
            $role2->givePermissionTo('unpublish articles');
    
            $role3 = Role::create(['name' => 'Super-Admin']);
    
            $user = \App\Models\User::factory()->create([
                'name' => 'Example User',
                'email' => 'test@example.com',
            ]);
            $user->assignRole($role1);
    
            $user = \App\Models\User::factory()->create([
                'name' => 'Example Admin User',
                'email' => 'admin@example.com',
            ]);
            $user->assignRole($role2);
    
            $user = \App\Models\User::factory()->create([
                'name' => 'Example Super-Admin User',
                'email' => 'superadmin@example.com',
            ]);
            $user->assignRole($role3);
        }
}
