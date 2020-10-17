<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'Reports';
$this->params['breadcrumbs'][] = $this->title;

\backend\assets\CustomPagerAsset::register($this);
?>
<div class="event-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Event', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $eventDataProvider,
        'layout' => '{items} {pager}',
        'pager' => [
            'class' => \backend\widgets\custompager\CustomPager::className(),
            'firstPageLabel' => 'First',
            'lastPageLabel' => 'Last',
            'maxButtonCount' => 4,
            'options' => [
                'class' => 'pagination',
                'style' => 'float:left;margin:20px 10px 20px 0;width:auto;'
            ],
            'pageCssClass' => [
                'class' => 'page-item'
            ],
            'linkOptions' => [
                'class' => 'page-link'
            ],
            'disabledPageCssClass' => 'disabled d-none',
            'sizeListHtmlOptions' => [
                'class' => 'form-control',
                'style' => 'display:inline-block;float:left;margin:20px 10px 20px 0;width:auto;'
            ]
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'name',
            // 'street:ntext',
            // 'city:ntext',
            // 'country:ntext',
            //'zip',
            [
                'attribute' => 'address',
                'content' => function ($model) {
                    return $model->getAddress();
                }
            ],
            'date',
            'time',
            //'created_at',
            //'updated_at',

            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('View Guests', '/report/event?id=' . $model->id, [
                            'class' => ['btn', 'btn-info']
                        ]);
                    },
                ]
            ],
        ],
    ]); ?>


</div>