<?php

namespace frontend\controllers;

use common\models\Book;
use Yii;
use yii\rest\ActiveController;
use yii\helpers\FileHelper;

class BooksController extends ActiveController
{
    public $modelClass = 'common\models\Book';

    //listar todos os livros
    public function actionList()
    {
        $livros = Book::find()
            ->select(['book.id', 'book.titulo as Titulo', 'book.autor as Autor', 'book.tema as Tema', 'book.editora',
                'book.numeropaginas', 'book.isbn', 'book.imagem'])
            ->from(['book'])
            ->asArray()
            ->all();

        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $livros;
    }

    //procura por autor
    public function actionAuthor()
    {
        $name = Yii::$app->request->post('autor');
        $livros = Book::find()
            ->select(['book.titulo as Titulo', 'book.autor as Autor', 'book.tema as Tema'])
            ->from(['book'])
            ->where(['book.autor' => $name])
            ->asArray()
            ->all();

        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $livros;
    }

    //carregar imagem
    public function actionImage($id)
    {
        $livros = Book::findOne($id);

        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $path = '../'.$livros->imagem;
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        return 'data:image/'.$ext.';base64,'.base64_encode(file_get_contents($path));
    }

}