<?php

namespace widewhale\debug\vardumper\panels;

use yii\debug\Panel;
use widewhale\debug\vardumper\components\VarDumper;
use widewhale\debug\vardumper\components\VarDumperEvent;


class VardumperPanel extends Panel
{
    private $_varDumps = [];

    const EVENT_DUMP = 'dump';

    public function init()
    {
        parent::init();
        Event::on(VarDump::className(), VarDumper::EVENT_VARDUMPER, function (VarDumperEvent $event) {
            $this->_varDumps[] = $event->dump;
        });
    }


    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'Var dumps';
    }

    /**
     * @inheritdoc
     */
    public function getSummary()
    {
        $url = $this->getUrl();
        $count = count($this->data);
        return "<div class=\"yii-debug-toolbar__block\"><a href=\"$url\">Var dumps <span class=\"yii-debug-toolbar__label yii-debug-toolbar__label_info\">$count</span></a></div>";
    }

    /**
     * @inheritdoc
     */
    public function getDetail()
    {
        return '<ol><li>' . implode('<li>', $this->data) . '</ol>';
    }

    /**
     * @inheritdoc
     */
    public function save()
    {
        return $this->_varDumps;
    }

}