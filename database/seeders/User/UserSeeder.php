<?php

namespace Database\Seeders\User;

use App\Models\Post\AbstractClasses\APost;
use App\Models\User\AbstractClasses\AUser;
use Database\Seeders\User\AbstractClasses\AUserSeeder;

class UserSeeder extends AUserSeeder
{
    /**
     * Run the database seeds.
     *
     * @param AUser $UserClass
     * @return void
     */
    public function run(AUser $UserClass) : void
    {
        $UserClass::factory(10)->create();
    }
}
