<?php

namespace common\models;

use Yii;
use common\models\Book;

class CreateBookForm extends \yii\base\Model
{
    public $imagem;
    public $titulo;
    public $autor;
    public $tema;
    public $editora;
    public $numeropaginas;
    public $isbn;

    public function rules()
    {
        return [
            [['titulo', 'autor', 'tema', 'editora', 'numeropaginas', 'isbn'], 'required'],
            [['tema', 'imagem'], 'string'],
            [['imagem'], 'file', 'skipOnEmpty'=> false, 'extensions'=> 'jpg, jpeg, png'],
            [['numeropaginas'], 'integer'],
            [['titulo', 'editora'], 'string', 'max' => 50],
            [['autor'], 'string', 'max' => 60],
            [['isbn'], 'string', 'max' => 15],
        ];
    }

}