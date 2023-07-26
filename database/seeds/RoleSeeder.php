<?php
/**
 * Created By Fachruzi Ramadhan
 *
 * @Filename     RoleSeeder.php
 * @LastModified 2/13/19 9:30 AM.
 *
 * Copyright (c) 2019. All rights reserved.
 */

use Illuminate\Database\Seeder;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sentinel::getRoleRepository()->createModel()->create([
            'name'        => 'Root',
            'permissions' => ['dashboard' => true],
            'slug'        => 'root',
            'created_by'  => 'Root',
            'updated_by'  => 'Root',
        ]);

        Sentinel::getRoleRepository()->createModel()->create([
            'name'        => 'Admin',
            'permissions' => ['dashboard' => true],
            'slug'        => 'admin',
            'created_by'  => 'Root',
            'updated_by'  => 'Root',
        ]);

        Sentinel::getRoleRepository()->createModel()->create([
            'name'        => 'Member',
            'permissions' => ['dashboard' => true],
            'slug'        => 'member',
            'created_by'  => 'Root',
            'updated_by'  => 'Root',
        ]);
    }
}
