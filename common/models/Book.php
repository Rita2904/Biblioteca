<?php

namespace common\models;

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
 * @property string $isbn
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
            [['imagem'], 'string', 'max'=> 32],
            [['numeropaginas'], 'integer'],
            [['titulo', 'editora'], 'string', 'max' => 50],
            [['autor'], 'string', 'max' => 60],
            [['isbn'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'titulo' => 'Título',
            'autor' => 'Autor',
            'tema' => 'Tema',
            'editora' => 'Editora',
            'numeropaginas' => 'Número de páginas',
            'isbn' => 'ISBN',
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
