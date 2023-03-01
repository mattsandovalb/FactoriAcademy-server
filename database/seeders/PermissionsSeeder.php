<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
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
        // app()[PermissionRegistrar::class]->forgetCachedPermissions();


        // Permission::create(['name' => 'create course']);
        // Permission::create(['name' => 'update course']);
        // Permission::create(['name' => 'delete course']);
        // // Permission::create(['name' => 'unpublish articles']);


        // $role1 = Role::create(['name' => 'user']);
       


        // $role2 = Role::create(['name' => 'admin']);
        // $role2->givePermissionTo('create course');
        // $role2->givePermissionTo('update course');
        // $role2->givePermissionTo('delete course');


        // $role3 = Role::create(['name' => 'Super-Admin']);
        // $role3->givePermissionTo('create course');
        // $role3->givePermissionTo('update course');
        // $role3->givePermissionTo('delete course');


        // $user = \App\Models\User::factory()->create([
        //     'name' => 'Example User',
        //     'email' => 'test@example.com',
        // ]);
        // $user->assignRole($role1);


        // $user = \App\Models\User::factory()->create([
        //     'name' => 'Example Admin User',
        //     'email' => 'admin@example.com',
        // ]);
        // $user->assignRole($role2);


        // $user = \App\Models\User::factory()->create([
        //     'name' => 'Example Super-Admin User',
        //     'email' => 'superadmin@example.com',
        // ]);
        // $user->assignRole($role3);

    }
}
