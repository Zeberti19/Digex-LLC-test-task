<?php
namespace App\Models\_Common\AbstractClasses;

use App\Models\_Common\Interfaces\IModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

abstract class AModel extends Model implements IModel
{
    use HasFactory;
}
