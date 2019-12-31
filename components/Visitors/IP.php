<?php

namespace app\components\Visitors;


use app\models\Visitor;
use Yii;

/**
 * Class IP
 * @package components\Visitors
 */
class IP
{

    /** @var Visitors */
    private $visitors;

    public function __construct(Visitors $visitors)
    {
        $this->visitors = $visitors;
    }


    /**
     *
     */
    public function check()
    {
        $ip = Yii::$app->request->userIP;

        $visitor = Visitor::findOne(['ip' => $ip]);

        if (!$visitor) {
            $visitor = new Visitor();
            $visitor->count = 1;
            $visitor->ip = $ip;
            $visitor->save();
        } else {
            $visitor->addVisit();
        }
    }
}