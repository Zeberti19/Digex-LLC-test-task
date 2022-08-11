<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\Comment\AbstractClasses\ACommentSeeder;
use Database\Seeders\Post\AbstractClasses\APostSeeder;
use Database\Seeders\User\AbstractClasses\AUserSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() : void
    {
        $CommentsSeederClass = App::make(ACommentSeeder::class);
        $PostSeederClass = App::make(APostSeeder::class);
        $UserSeederClass = App::make(AUserSeeder::class);

        $this->call($UserSeederClass::class);
        $this->call($PostSeederClass::class);
        $this->call($CommentsSeederClass::class);
    }
}
