<?php

use yii\grid\GridView;

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        [
            'attribute' => 'line',
            'format' => 'text',
            'label' => 'Line',
        ],
        [
            'attribute' => 'file',
            'format' => 'text',
            'label' => 'File',
        ],
        [
            'attribute' => 'dump',
            'format' => 'html',
            'label' => 'Dump',
        ],
    ],
]);