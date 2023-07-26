<?php

use App\Traits\Users\AttachRoleTrait;
use Illuminate\Database\Seeder;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class UserSeeder extends Seeder
{
    use AttachRoleTrait;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'name'     => "Root",
            'type'     => "user",
            'email'    => "root@admin.com",
            'password' => "12345678",
            'phone'    => '08189890000',
        ];

        //Create a new user and activated that users
        $user = Sentinel::registerAndActivate($data);

        $this->attach($user, 'Root');
    }
}
