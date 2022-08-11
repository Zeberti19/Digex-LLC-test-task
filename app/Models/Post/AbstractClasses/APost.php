<?php
namespace App\Models\Post\AbstractClasses;

use App\Models\_Common\AbstractClasses\AModel;
use App\Models\Post\Interfaces\IPost;

abstract class APost extends AModel implements IPost
{
    /**
     * Name of database column for storing foreign key of post author
     *
     * @var string
     */
    static public string $authorForeignKey = "author_id";

    protected $fillable = ['title', 'text'];

    /**
     * Length of title
     *
     * @var int
     */
    static public int $titleLength = 100;
}
