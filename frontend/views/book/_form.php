<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Book */
/* @var $img yii\widgets\ActiveForm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="book-form">

    <?php $form = ActiveForm::begin(['options'=> ['enctype'=> 'multipart/form-data']]); ?>

    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'autor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tema')->dropDownList([ 'arte e design' => 'Arte e design', 'literatura' => 'Literatura', 'ficcao' => 'Ficcao', 'ciencia' => 'Ciencia', 'tecnologia' => 'Tecnologia', 'desporto' => 'Desporto', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'editora')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'numeropaginas')->textInput() ?>

    <?= $form->field($model, 'isbn')->textInput() ?>

    <?= $form->field($model, 'imagem')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
