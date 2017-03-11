<?php

namespace widewhale\debug\vardumper\components;

use yii\base\Event;

class VarDumperEvent extends Event
{
    public $dump;
}