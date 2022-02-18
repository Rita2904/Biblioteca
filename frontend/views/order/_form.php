<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Order */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    $session = \Yii::$app->session;
    $book = $session->get('idbook');
    $user = Yii::$app->user->id;
    $books = $session->get('titulo');
    ?>


    <?= $form->field($model, 'descricao')->textInput(['value'=> $books]);
    //var_dump($books);
    ?>

    <?= $form->field($model, 'data')->textInput() ?>

    <?= $form->field($model, 'quantidade')->textInput() ?>

    <?= $form->field($model, 'idbook')->hiddenInput(['value' => $book]);
    //var_dump($book); ?>
    <?= $form->field($model, 'iduser')->hiddenInput(['value'=> $user]);
    //var_dump($user);?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
