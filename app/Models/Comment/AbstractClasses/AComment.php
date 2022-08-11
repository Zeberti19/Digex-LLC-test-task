<?php
namespace App\Models\Comment\AbstractClasses;

use App\Models\_Common\AbstractClasses\AModel;
use App\Models\Comment\Interfaces\IComment;

abstract class AComment extends AModel implements IComment
{
    /**
     * Name of database column for storing foreign key of comment author
     *
     * @var string
     */
    static public string $authorForeignKey = "author_id";

    protected $fillable = ['text'];
}
