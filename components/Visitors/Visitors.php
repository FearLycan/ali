<?php

namespace app\components\Visitors;

use yii\base\Component;

/**
 * Class Visitors
 * @package components\Visitors
 * @property IP $ip;
 */
class Visitors extends Component
{
    private $ip;

    /**
     * @return IP
     */
    public function getIP()
    {
        if ($this->ip == null) {
            $this->ip = new IP($this);
        }
        return $this->ip;
    }
}