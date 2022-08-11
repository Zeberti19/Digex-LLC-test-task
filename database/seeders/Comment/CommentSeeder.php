<?php

namespace Database\Seeders\Comment;

use App\Models\Comment\AbstractClasses\AComment;
use App\Models\Comment\Interfaces\ICommentable;
use App\Models\Post\AbstractClasses\APost;
use App\Models\User\AbstractClasses\AUser;
use Database\Seeders\Comment\AbstractClasses\ACommentSeeder;

class CommentSeeder extends ACommentSeeder
{
    public function __construct(
        protected AComment $CommentClass,
        protected APost $PostClass,
        protected AUser $UserClass,
    )
    {
        //
    }

    protected function commentMake(ICommentable $Commentable) : AComment
    {
        $User = $this->UserClass::inRandomOrder()->first();
        $Comment = $this->CommentClass::factory()->make();
        $Comment->author()->associate($User);
        $Comment->commentable()->associate($Commentable);
        $Comment->save();

        return $Comment;
    }

    protected function commentRepliesMake(ICommentable $Commentable) : void
    {
        $commentRepliesCount = rand(0,2);
        for( $n = 0; $n < $commentRepliesCount; $n++)
        {
            $this->commentMake($Commentable);
        }
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() : void
    {
        foreach ( $this->PostClass::all() as $Post )
        {
            $commentCount = rand(0,3);
            for( $n = 0; $n < $commentCount; $n++)
            {
                //comment post
                $Comment = $this->commentMake($Post);

                //create replies for post comment
                $this->commentRepliesMake($Comment);

                //comment post logo
                if ($Post->image)
                {
                    $Comment = $this->commentMake($Post->image);

                    //create replies for logo comment
                    $this->commentRepliesMake($Comment);
                }
            }
        }
    }
}
