<?php

namespace Database\Seeders\Post;

use App\Models\Image\Interfaces\IImagePostLogo;
use App\Models\Post\AbstractClasses\APost;
use App\Models\User\AbstractClasses\AUser;
use Database\Seeders\User\AbstractClasses\AUserSeeder;

class PostSeeder extends AUserSeeder
{
    /**
     * Run the database seeds.
     *
     * @param APost $PostClass
     * @param AUser $UserClass
     * @return void
     */
    public function run(IImagePostLogo $ImageClass, APost $PostClass, AUser $UserClass) : void
    {
        foreach ( $UserClass::all() as $User )
        {
            $postCount = rand(0,2);
            for( $n = 0; $n < $postCount; $n++)
            {
                $Post = $PostClass::factory()->make();
                $Post->author()->associate($User);
                $Post->save();

                if (rand(0,1))
                {
                    $PostLogo = $ImageClass::factory()->make();
                    $Post->image()->save($PostLogo);
                }
            }
        }
    }
}
