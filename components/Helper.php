<?php

namespace app\components;


use app\models\SystemConfig;
use Yii;
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
            return false;
        } else {
            return $system->value;
        }
    }

    public static function setSystemConfig($name, $value)
    {
        /* @var $system SystemConfig */
        $system = SystemConfig::find()
            ->where(['name' => $name])
            ->one();

        if (empty($system)) {
            $system = new SystemConfig();
            $system->name = $name;
            $system->author_id = Yii::$app->user->identity->id;
        }

        $system->value = $value;
        $system->save();

        return $system;
    }

    public static function getAliProductID($url)
    {
        self::getBetween($url, '', '?');

        $n = explode('/', $url);

        $phrase = end($n);

        $phrase = str_replace(".html", "", $phrase);

        return $phrase;
    }

    public static function shortNumber($num)
    {
        $units = ['', 'K+', 'M+', 'B+', 'T+'];
        for ($i = 0; $num >= 1000; $i++) {
            $num /= 1000;
        }
        return round($num, 1) . $units[$i];
    }

    public static function changeTimeZone($dateString, $timeZoneSource = null, $timeZoneTarget = null)
    {
        if (empty($timeZoneSource)) {
            $timeZoneSource = date_default_timezone_get();
        }
        if (empty($timeZoneTarget)) {
            $timeZoneTarget = date_default_timezone_get();
        }

        $dt = new \DateTime($dateString, new \DateTimeZone($timeZoneSource));
        $dt->setTimezone(new \DateTimeZone($timeZoneTarget));

        return $dt->format("Y-m-d H:i:s");
    }
}
