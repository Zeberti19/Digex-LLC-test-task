<?php

namespace Database\Seeders\User;

use App\Models\User\AbstractClasses\AUser;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
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
