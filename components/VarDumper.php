<?php
/**
 * Created by PhpStorm.
 * User: nikol
 * Date: 11/03/2017
 * Time: 23:19
 */

namespace widewhale\debug\vardumper\components;

use Yii;
use yii\base\Component;
use yii\helpers\VarDumper as YiiVarDumper;
use widewhale\debug\vardumper\components\VarDumperEvent;

class VarDumper extends Component
{
    public function dump($var, $depth = 10)
    {
        $event = new VarDumperEvent;
        $event->dump = YiiVarDumper::dumpAsString($var, $depth, true);;

        $this->trigger(VarDumperEvent::EVENT_VARDUMPER, $event);
    }
}