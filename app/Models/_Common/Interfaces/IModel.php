<?php

namespace App\Models\_Common\Interfaces;

use Illuminate\Contracts\Broadcasting\HasBroadcastChannel;
use Illuminate\Contracts\Queue\QueueableEntity;
use Illuminate\Contracts\Routing\UrlRoutable;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\CanBeEscapedWhenCastToString;
use Illuminate\Contracts\Support\Jsonable;

use ArrayAccess;
use JsonSerializable;

interface IModel extends Arrayable, ArrayAccess, CanBeEscapedWhenCastToString, HasBroadcastChannel, Jsonable,
                         JsonSerializable, QueueableEntity, UrlRoutable
{
    //add here something common for all models if you will need it
}
