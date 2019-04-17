<?php

namespace widewhale\debug\vardumper\components;

use Yii;
use yii\base\Component;
use widewhale\debug\vardumper\components\VarDumperEvent;

class VarDumper extends Component
{
    public static function dump($var, $depth = 10)
    {
        $event = new VarDumperEvent;
        $backtrace = debug_backtrace(1);
        $event->dump = \yii\helpers\VarDumper::dumpAsString($var, $depth, true);
        $event->line = $backtrace[0]['line'];
        $event->file = $backtrace[0]['file'];

        Yii::$app->trigger('widewhale.debug.vardumper.dump', $event);
    }
}
