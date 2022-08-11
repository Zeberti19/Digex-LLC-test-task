<?php
namespace Database\Seeders\Post\AbstractClasses;

use Database\Seeders\_Common\AbstractClasses\ASeeder;
use Database\Seeders\User\Interfaces\IUserSeeder;

abstract class APostSeeder extends ASeeder implements IUserSeeder
{
    //add here something common for all classes of this hierarchy
}
