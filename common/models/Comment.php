<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property int $id
 * @property string $text
 * @property string $created
 * @property string $author
 * @property int $idpost
 *
 * @property Post $idpost0
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text', 'author', 'idpost'], 'required'],
            [['text'], 'string'],
            [['created'], 'safe'],
            [['idpost'], 'integer'],
            [['author'], 'string', 'max' => 32],
            [['idpost'], 'exist', 'skipOnError' => true, 'targetClass' => Post::className(), 'targetAttribute' => ['idpost' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'Texto',
            'created' => 'Created',
            'author' => 'Autor',
            'idpost' => 'Post',
        ];
    }

    /**
     * Gets query for [[Idpost0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdpost0()
    {
        return $this->hasOne(Post::className(), ['id' => 'idpost']);
    }


}
