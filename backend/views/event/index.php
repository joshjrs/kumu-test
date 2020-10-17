<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'Events';
$this->params['breadcrumbs'][] = $this->title;

\backend\assets\CustomPagerAsset::register($this);
?>
<div class="event-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Event', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
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
                    'view' => function ($url) {
                        return Html::a('View', $url, [
                            'class' => ['btn', 'btn-info']
                        ]);
                    },
                    'update' => function ($url) {
                        return Html::a('Update', $url, [
                            'class' => ['btn', 'btn-primary']
                        ]);
                    },
                    'delete' => function ($url) {
                        return Html::a('Delete', $url, [
                            'data-method' => 'post',
                            'data-confirm' => 'Are you sure?',
                            'class' => ['btn', 'btn-danger']
                        ]);
                    }
                ]
            ],
        ],
    ]); ?>


</div>