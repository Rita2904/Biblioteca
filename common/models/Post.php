<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property string $title
 * @property string $text
 * @property resource|null $image
 * @property string $created_at
 * @property string|null $updated_at
 * @property string|null $author
 * @property int|null $comment
 *
 * @property Post $comment0
 * @property Comment[] $comments
 * @property Post[] $posts
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'text'], 'required'],
            [['text', 'image'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['comment'], 'integer'],
            [['title'], 'string', 'max' => 56],
            [['author'], 'string', 'max' => 32],
            [['comment'], 'exist', 'skipOnError' => true, 'targetClass' => Post::className(), 'targetAttribute' => ['comment' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Título',
            'text' => 'Texto',
            'image' => 'Imagem',
            'created_at' => 'Criado em',
            'updated_at' => 'Atualizado em',
            'author' => 'Autor',
            'comment' => 'Comentário',
        ];
    }

    /**
     * Gets query for [[Comment0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComment0()
    {
        return $this->hasMany(Post::className(), ['comment' => 'id']);
    }

    /**
     * Gets query for [[Comments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['idpost' => 'id']);
    }

    /**
     * Gets query for [[Posts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Post::className(), ['comment' => 'id']);
    }
}
