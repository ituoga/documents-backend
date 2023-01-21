<?php

namespace App\Support;

use Illuminate\Support\Facades\Log;

class HtmlToString
{
    private static $return = [];

    public static function parse($input)
    {
        parse_str($input, $output);
        self::$return = [];
        self::_parse($output);
        return implode(".", self::$return);
    }

    private static function _parse($item, $depth = 0)
    {
        $key = key($item);
        self::$return[] =  $key;
        if (empty($key)) {
            return;
        }
        if (is_array($item[$key])) {
            self::_parse($item[$key], $depth+1);
        }
    }
}
