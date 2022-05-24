<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsDemoSeeder extends Seeder
{
    /**
     * Create the initial roles and permissions.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions

        Permission::create(['name' => 'role-edit']);
        Permission::create(['name' => 'role-list']);
        Permission::create(['name' => 'user-list']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'Super-Admin']);
        $role1->givePermissionTo('role-edit');
        $role1->givePermissionTo('role-list');
        $role1->givePermissionTo('user-list');
        $role2 = Role::create(['name' => 'Admin']);
        $role2->givePermissionTo('role-edit');
        $role2->givePermissionTo('role-list');
        $role2->givePermissionTo('user-list');
        $role3 = Role::create(['name' => 'Students']);
    
   
        $user = \App\Models\User::factory()->create([
            'name' => 'Super-Admin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('123456'),
            'mobile'=>'01943711281',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'),
            'mobile'=>'01894926622',
        ]);
        $user->assignRole($role2);
        
        $user = \App\Models\User::factory()->create([
            'name' => 'Afif Student',
            'email' => 'afifstudent@gmail.com',
            'password' => Hash::make('123456'),
            'mobile'=>'01515607893',

        ]);
        $user->assignRole($role3);


       

     

      
    }
}