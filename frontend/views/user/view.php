<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

//$this->title = $model->id;
//$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <br>

    <p>
        <?= Html::a('«-- Voltar', ['/site', 'id' => $model->id], ['class' => 'btn btn-info']) ?>
        <?php Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <br>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'username',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            'email:email',
            //'status',
            //'created_at',
            //'updated_at',
            //'verification_token',
            'morada',
            'nif',
            'contacto',
            //'perfil',
        ],
    ]) ?>
<br>
<br>
    <?= Html::a('Lista de favoritos --»', ['site/index', 'id' => $model->id], ['class' => 'btn btn-info']) ?>
    <br>
    <br>
    <?= Html::a('Histórico de livros requisitados --»', ['order/index', 'id' => $model->id], ['class' => 'btn btn-info']) ?>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
</div>
