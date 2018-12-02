<?php

namespace app\components;


use app\models\SystemConfig;
use yii\helpers\Inflector;

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

    public static function cutURL($url, $limit = 100)
    {

        if (strlen($url) < $limit) {
            return $url;
        }

        return substr($url, 0, $limit) . '...';
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

    public static function varietyOfWord($word, $number)
    {
        if ($number == 1) {
            return Inflector::singularize($word);
        } else {
            return Inflector::pluralize($word);
        }
    }

    public static function systemConfig($name)
    {
        /* @var $system SystemConfig */
        $system = SystemConfig::find()
            ->where(['name' => $name, 'status' => SystemConfig::STATUS_ACTIVE])
            ->one();

        if ($system == null) {
            return '<!-- Config: ' . $name . ' was not found  -->';
        } else {
            return $system->value;
        }
    }
}