<?php

namespace App\Help;

class Menu  
{
    public static function active($page)
    {
        $path = app('request')->path();

        if (str_contains($path, $page))
            return 'active';

        return '';
    }
}