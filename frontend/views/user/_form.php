<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?php $form->field($model, 'auth_key')->textInput(['maxlength' => true]) ?>

    <?php $form->field($model, 'password_hash')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?php $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'morada')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nif')->textInput() ?>

    <?= $form->field($model, 'contacto')->textInput() ?>

    <?php $form->field($model, 'perfil')->dropDownList([ 'admin' => 'Admin', 'librarian' => 'Librarian', 'bookmanager' => 'Bookmanager', 'client' => 'Client', ], ['prompt' => '']) ?>

    <br>
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
