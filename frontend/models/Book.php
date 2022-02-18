<?php

namespace frontend\models;

use common\models\Order;
use Yii;

/**
 * This is the model class for table "book".
 *
 * @property int $id
 * @property string $titulo
 * @property string $autor
 * @property string $tema
 * @property string $editora
 * @property int $numeropaginas
 * @property int $isbn
 * @property resource|null $imagem
 *
 * @property Order[] $orders
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['titulo', 'autor', 'tema', 'editora', 'numeropaginas', 'isbn'], 'required'],
            [['tema', 'imagem'], 'string'],
            [['numeropaginas', 'isbn'], 'integer'],
            [['titulo', 'editora'], 'string', 'max' => 50],
            [['autor'], 'string', 'max' => 128],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'titulo' => 'Titulo',
            'autor' => 'Autor',
            'tema' => 'Tema',
            'editora' => 'Editora',
            'numeropaginas' => 'Número de páginas',
            'isbn' => 'ISBN',
            'imagem' => 'Imagem',
        ];
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['idbook' => 'id']);
    }
}
