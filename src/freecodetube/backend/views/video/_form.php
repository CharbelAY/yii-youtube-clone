<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Video */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="video-form">

    <?php $form = ActiveForm::begin([
            'options'=>['enctype'=>'multipart/form-data']
    ]); ?>

<div class="row">
    <div class="col-sm-8">

        <?= $form->errorSummary($model) ?>
        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

        <label> <?= $model->getAttributeLabel('thumbnail')?></label>
        <div class="form-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="thumbnail" name="thumbnail">
                <label class="custom-file-label" for="thumbnail">Choose file</label>
            </div>
        </div>

        <?= $form->field($model, 'tags')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-sm-4">
        Video
        <br>
        <div>
            <div class="embed-responsive embed-responsive-16by9">
                <video class="embed-responsive-item"
                       poster="<?= $model->getThumbnailLink()?>"
                       src="<?= $model->getVideoLink() ?>" controls></video>
            </div>
            <div class="text-muted">Video Link</div>
            <a href="<?= $model->getVideoLink() ?>">Open video</a>
        </div>
        <div>
            <div class="text-muted">Video Name</div>
            <?= $model->video_name ?>
        </div>
        <?= $form->field($model, 'status')->dropdownList($model->getStatusLabels()) ?>
    </div>
</div>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
