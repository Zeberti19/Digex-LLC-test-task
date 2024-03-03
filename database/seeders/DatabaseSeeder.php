<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\Comment\AbstractClasses\ACommentSeeder;
use Database\Seeders\Comment\CommentSeeder;
use Database\Seeders\Post\AbstractClasses\APostSeeder;
use Database\Seeders\Post\PostSeeder;
use Database\Seeders\User\AbstractClasses\AUserSeeder;
use Database\Seeders\User\UserSeeder;
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
        $this->call(UserSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(CommentSeeder::class);
    }
}
