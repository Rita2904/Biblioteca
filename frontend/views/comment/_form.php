<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Comment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    $session = \Yii::$app->session;
    $post = $session->get('idpost') ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <?php $form->field($model, 'created')->textInput() ?>

    <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idpost')->textInput(['value' => $post, 'type'=> 'hidden']);
    //var_dump($post);
    ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
