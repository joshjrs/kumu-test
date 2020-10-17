<?php

use yii\bootstrap4\Nav;
?>

<aside class="shadow">
    <?php echo Nav::widget([
        'options' => [
            'class' => 'd-flex flex-column nav-pills'
        ],
        'items' => [
            [
                'label' => 'Manage Guest',
                'url' => ['/guest/index']
            ],
            [
                'label' => 'Manage Events',
                'url' => ['/event/index']
            ],
            [
                'label' => 'Reports',
                'url' => ['/report/index']
            ],
        ]
    ]) ?>
</aside>