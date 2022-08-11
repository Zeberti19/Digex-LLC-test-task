<?php

namespace App\Models\User\Interfaces;

use App\_Common\IClass;

use ArrayAccess;
use JsonSerializable;

use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Contracts\Broadcasting\HasBroadcastChannel;
use Illuminate\Contracts\Queue\QueueableEntity;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\CanBeEscapedWhenCastToString;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Contracts\Routing\UrlRoutable;


interface IUser extends IClass, Arrayable, ArrayAccess,
    CanBeEscapedWhenCastToString, HasBroadcastChannel, Jsonable,
    JsonSerializable, QueueableEntity, UrlRoutable, AuthenticatableContract,
    AuthorizableContract, CanResetPasswordContract
{
    //
}
