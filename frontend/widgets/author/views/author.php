<?php
use yii\grid\GridView;

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        //'title',
        [
            'attribute' => 'title',
            'header' => $author,

        ],
//        [
//            'attribute' => 'title',
//            'value'     => function ( $data ) {
//                return $data->author['firstName']." ". $data->author['lastName'];
//            },
//        ],
        // ...
    ],
]) ?>