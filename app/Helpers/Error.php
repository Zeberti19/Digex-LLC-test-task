<?php

namespace App\Helpers;

use App\_Common\IClass;

class Error implements IClass
{
    /**
     * Shows different messages depended on debug mode (either message for a programmer or user)
     *
     * @param string $mesProg
     * @param string $mesUser
     * @return string
     */
    static public function mes(string $mesProg, string $mesUser = "Unknown error occurred" ) : string
    {
        return config('app.debug') ? $mesProg : $mesUser;
    }
}
