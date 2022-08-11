<?php
namespace Database\Seeders\_Common\AbstractClasses;

use Database\Seeders\_Common\Interfaces\ISeeder;
use Illuminate\Database\Seeder;

abstract class ASeeder extends Seeder implements ISeeder
{
    //add here something common for all classes of this hierarchy
}
