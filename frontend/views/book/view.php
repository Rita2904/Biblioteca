<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Book */

//$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$id = $model->id;
$title = $model->titulo;
$_SESSION['idbook'] = $id;
$_SESSION['titulo'] = $title;

\yii\web\YiiAsset::register($this);
?>
<div class="book-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php Html::a('Delete', ['delete', 'id' => $model->id], [
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
            //'id',
            'titulo',
            'autor',
            'tema',
            'editora',
            'numeropaginas',
            'isbn',
            //'image',
            [
                'attribute'=> 'imagem',
                'value'=> Yii::$app->homeUrl."../".$model->imagem,
                'format'=> ['image']
            ]
        ],
    ]);

    //echo Html::img('@web/../'.$model->imagem);
    ?>

</div>
<?php if(!Yii::$app->user->isGuest) {?>
<div class="text-right">
    <div class="btn btn-dark"><?php echo Html::a('Requisitar', ['order/create', 'id'=> $id, 'descricao'=> $title]); ?></div>
</div>
<?php }?>
<br>
<br>
