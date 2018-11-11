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

    public static function getBetween($content, $start, $end)
    {

        if (!empty($start)) {
            $r = explode($start, $content);
        } else {
            $r[1] = $content;
        }

        if (isset($r[1])) {

            if (!empty($end)) {
                $r = explode($end, $r[1]);
                return $r[0];
            } else {
                return $r[1];
            }
        }
        return '';
    }
}