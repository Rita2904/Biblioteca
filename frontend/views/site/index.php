<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use slavkovrn\imagecarousel\ImageCarouselWidget;

$this->title = 'Biblioteca';
?>
<div class="site-index">

    <div class="body-content">
        <?= ImageCarouselWidget::widget([
            'id' =>'image-carousel',    // unique id of widget
            'width' => 1000,             // width of widget container
            'height' => 300,            // height of widget container
            'img_width' => 150,         // width of central image
            'img_height' => 200,        // height of central image
            'images' => [               // images of carousel
                [
                    'src' => '../images/livro_2.png',
                    'alt' => 'Image 1',
                ],
                [
                    'src' => '../images/livro_3.png',
                    'alt' => 'image 2',
                ],
                [
                    'src' => '../images/livro_4.png',
                    'alt' => 'image 3',
                ],
                [
                    'src' => '../images/livro_5.png',
                    'alt' => 'image 4',
                ],
                [
                    'src' => '../images/livro_6.png',
                    'alt' => 'image 4',
                ],
                [
                    'src' => '../images/livro_7.png',
                    'alt' => 'image 4',
                ],
                [
                    'src' => '../images/livro_8.png',
                    'alt' => 'image 4',
                ],
                [
                    'src' => '../images/livro_9.png',
                    'alt' => 'image 4',
                ],
                [
                    'src' => '../images/livro_10.png',
                    'alt' => 'image 4',
                ],
                [
                    'src' => '../images/livro_11.png',
                    'alt' => 'image 4',
                ],
            ]
        ]) ?>

        <!--
        <div class="row">
            <div class="col-lg-3">

                <p><img class="book" src="/biblioteca/frontend/images/livro_3.png"></p>

                <p><a class="btn btn-outline-secondary" <?= Html::a('Ver mais »', ['book/view', 'id' => 1]) ?> </a></p>
            </div>
            <div class="col-lg-3">

                <p><img class="book" src="/biblioteca/frontend/images/livro_2.png"></p>

                <p><a class="btn btn-outline-secondary" <?= Html::a('Ver mais »', ['book/view', 'id' => 2]) ?></a></p>
            </div>
            <div class="col-lg-3">

                <p><img class="book" src="/biblioteca/frontend/images/livro_4.png"></p>

                <p><a class="btn btn-outline-secondary" <?= Html::a('Ver mais »', ['book/view', 'id' => 3]) ?></a></p>
                <br>
                <br>
            </div>
            <div class="col-lg-3">

                <p><img class="book" src="/biblioteca/frontend/images/livro_5.png"></p>

                <p><a class="btn btn-outline-secondary" <?= Html::a('Ver mais »', ['book/view', 'id' => 4]) ?></a></p>
                <br>
                <br> -->

        <div class="jumbotron text-center bg-transparent">
            <!-- <h1 class="display-4">Benvindo/a à Biblioteca</h1> -->

        <h3><?= Html::a('Consultar livros', ['book/index']) ?> <img src="/biblioteca/frontend/images/book_icon.png">
            <?=Html::a('Blog', ['post/index']) ?> <img src="/biblioteca/frontend/images/blog_icon.png"></h3>
        <p style="font-family: 'Arial Black',sans-serif; font-size: 33px"> </p>
        </div>
    </div>

            <br>
            <br>
        </div>

    </div>
</div>
