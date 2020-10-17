<?php

use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\helpers\Url;

NavBar::begin([
    'brandLabel' => Yii::$app->name,
    'brandUrl' => Yii::$app->homeUrl,
    'options' => ['class' => 'navbar-expand-lg navbar-light bg-light shadow-sm']
]);

$menuItems = [];
?>
<form action="<?php echo Url::to(['/guest/search']) ?>" class="form-inline my-2 my-lg-0">
    <input type="text" class="typeahead form-control mr-sm-2" placeholder="Search guest" name="keyword" value="<?php echo Yii::$app->request->get('keyword') ?>" autocomplete="off">
    <input type="hidden" name="autocomplete_url" value="<?php echo Url::to(['/guest/autocomplete']) ?>">
    <button class="btn btn-outline-success my-2 my-sm-0" id="search-button" disabled>Search</button>
</form>

<?php
echo Nav::widget([
    'options' => ['class' => 'navbar-nav ml-auto'],
    'items' => $menuItems,
]);
NavBar::end();
