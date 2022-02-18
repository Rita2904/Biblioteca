<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Post */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$id = $model->id;
$_SESSION['idpost'] = $id;

\yii\web\YiiAsset::register($this);
?>
<div class="post-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'text:ntext',
            'image',
            'created_at',
            'updated_at',
            'author',
            //'comment',
        ],
    ]) ?>
    <hr>
    <div id="comments">
        <?php
        echo '<h4>Comentários</h4><br>';
        $comment = $model->comments;
        foreach ($comment as $comments) {
            echo $comments['author'].': '. $comments['text'].'<hr><br>';
            }
        //var_dump($post);
        ?>
    </div>

    <br>
    <br>
    <br>
    <div class="text-right" style="font-size: 20px">

        <br>
        <?= Html::a('<= Voltar', ['index']); ?>

    </div>

</div>
