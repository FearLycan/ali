<?php

namespace app\components;


class Helper
{
    public static function cutThis($str, $limit = 100, $strip = false)
    {
        $str = ($strip == true) ? strip_tags($str) : $str;
        if (strlen($str) > $limit) {
            $str = substr($str, 0, $limit - 3);
            return (substr($str, 0, strrpos($str, ' ')) . '...');
        }
        return trim($str);
    }
}