<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'Kumu - Guest Book';
?>
<div class="site-index">

    <div class="card">
        <div class="card-body">
            <div class="container">
                <form action="<?php echo Url::to(['/site/create']) ?>" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <?= $this->render('_form_guest', [
                                'guestModel' => $guestModel,
                            ]) ?>
                        </div>
                        <div class="col-md-6">
                            <h2 class="mb-3">Events</h2>
                            <?php
                            foreach ($eventModel as $event) {
                            ?>
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="event[]" value="<?= $event->id ?>" class="custom-control-input" id="customCheck<?= $event->id ?>">
                                            <label class="custom-control-label" for="customCheck<?= $event->id ?>"><strong><?= $event->name ?></strong></label>
                                            <p class="mt-3"><strong>Location:</strong> <?= $event->getAddress() ?></p>
                                            <p><strong>Date:</strong> <?= $event->date ?></p>
                                            <p><strong>Time:</strong> <?= $event->time ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <?= Html::submitButton('Register', ['class' => 'btn btn-primary btn-lg btn-block']) ?>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>


</div>