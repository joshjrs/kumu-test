<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Report ';
$this->params['breadcrumbs'][] = $this->title;

\backend\assets\CustomPagerAsset::register($this);
?>
<div class="guest-index">

    <h1><?= Html::encode($this->title) ?></h1>

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
            [
                'attribute' => 'first_name',
                'content' => function ($model) {
                    return $model->guest->first_name;
                }
            ],
            [
                'attribute' => 'last_name',
                'content' => function ($model) {
                    return $model->guest->last_name;
                }
            ],
            [
                'attribute' => 'email',
                'content' => function ($model) {
                    return $model->guest->email;
                }
            ],
            [
                'attribute' => 'phone_number',
                'content' => function ($model) {
                    return $model->guest->phone_number;
                }
            ],
            //'gender',
            //'street:ntext',
            //'city:ntext',
            //'country:ntext',
            //'zip',
            //'created_at',
            //'updated_at',

            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('View', '/guest/view?id=' . $model->id, [
                            'class' => ['btn', 'btn-info']
                        ]);
                    },
                ]
            ],
        ],
    ]); ?>


</div>