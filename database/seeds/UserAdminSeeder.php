<?php
/**
 * Created By Dedi Fardiyanto
 *
 * @Filename     UserAdminSeeder.php
 * @LastModified 2/13/19 9:30 AM.
 *
 * Copyright (c) 2019. All rights reserved.
 */

use App\Traits\Users\AttachRoleTrait;
use Illuminate\Database\Seeder;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class UserAdminSeeder extends Seeder
{
    use AttachRoleTrait;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataSales = [
            'name'     => "Admin",
            'type'     => "user",
            'email'    => "admin@admin.com",
            'password' => "12345678",
            'phone'    => '08189890001',
        ];

        //Create a new user and activated that users
        $user = Sentinel::registerAndActivate($dataSales);

        $this->attach($user, 'Admin');
    }
}
