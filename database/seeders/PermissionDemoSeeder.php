<?php

namespace Database\Seeders;

use App\Models\User;  
use Illuminate\Database\Seeder;  
use Spatie\Permission\Models\Permission;  
use Spatie\Permission\Models\Role;  
use Spatie\Permission\PermissionRegistrar;

class PermissionDemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // reset cahced roles and permission
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'view posts']);
        Permission::create(['name' => 'create posts']);
        Permission::create(['name' => 'edit posts']);
        Permission::create(['name' => 'delete posts']);
        Permission::create(['name' => 'publish posts']);
        Permission::create(['name' => 'unpublish posts']);

        //create roles and assign existing permissions
        $writerRole = Role::create(['name' => 'posyandu']);
        $writerRole->givePermissionTo('view posts');
        $writerRole->givePermissionTo('create posts');

        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo('view posts');
        $adminRole->givePermissionTo('create posts');
        $adminRole->givePermissionTo('edit posts');
        $adminRole->givePermissionTo('delete posts');
        $adminRole->givePermissionTo('publish posts');
        $adminRole->givePermissionTo('unpublish posts');

        $writerRole = Role::create(['name' => 'faskes']);
        $writerRole->givePermissionTo('view posts');

        // create demo users
        $user = User::factory()->create([
            'name' => 'Example posyandu user',
            'username' => 'posyandu',
            'password' => bcrypt('12345678')
        ]);
        $user->assignRole($writerRole);

        $user = User::factory()->create([
            'name' => 'Example admin user',
            'username' => 'admin',
            'password' => bcrypt('12345678')
        ]);
        $user->assignRole($adminRole);

        $user = User::factory()->create([
            'name' => 'Example faskes user',
            'username' => 'faskes',
            'password' => bcrypt('12345678')
        ]);
        
    }
}