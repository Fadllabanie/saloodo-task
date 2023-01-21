<?php

namespace App\Helpers;

class Helper
{
    public static function user($guard = 'web')
    {
        return auth()->guard($guard)->user();
    }
}