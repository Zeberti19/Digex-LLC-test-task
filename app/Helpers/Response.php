<?php

namespace App\Helpers;

use Illuminate\Http\RedirectResponse;

class Response
{
    /**
     * Create a new redirect response to the previous location with HTTP code 303
     *
     * @param  array  $headers
     * @param  mixed  $fallback
     * @return RedirectResponse
     */
    static public function back303( array $headers = [], $fallback = false) : RedirectResponse
    {
        return back(303, $headers, $fallback);
    }
}
