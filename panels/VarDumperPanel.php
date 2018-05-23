<?php

namespace widewhale\debug\vardumper\panels;

use Yii;
use yii\data\ArrayDataProvider;
use yii\debug\Panel;
use widewhale\debug\vardumper\components\VarDumperEvent;

class VarDumperPanel extends Panel
{
    private $_varDumps;

    const EVENT_DUMP = 'dump';

    public function init()
    {
        parent::init();
        Yii::$app->on('widewhale.debug.vardumper.dump', function (VarDumperEvent $event) {
            $this->_varDumps[] = [
                'line' => $event->line,
                'file' => $event->file,
                'dump' => $event->dump,
            ];
        });
    }

    public function getName()
    {
        return 'Var dumps';
    }

    public function getSummary()
    {

        $url = $this->getUrl();
        
        if (is_array($this->data)) {
            $count = \count($this->data);
        } else {
            $count = 0;
        }

        return Yii::$app->view->render('@widewhale/debug/vardumper/views/default/summary', [
            'count' => $count,
            'url' => $url,
        ]);
    }

    public function getDetail()
    {
        $dataProvider = new ArrayDataProvider([
            'allModels' => $this->data,
        ]);
        return Yii::$app->view->render('@widewhale/debug/vardumper/views/default/detail', [
            'dataProvider' => $dataProvider,
            'panel' => $this,
        ]);
    }

    public function save()
    {
        return $this->_varDumps;
    }
}
