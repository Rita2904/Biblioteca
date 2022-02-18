<?php

namespace frontend\controllers;

use common\models\Comment;
use common\models\Post;
use Yii;
use yii\rest\ActiveController;

class PostsController extends ActiveController
{
    public $modelClass = 'common\models\Post';

    public function actionList()
    {
        $posts = Post::find()
            ->select(['post.id', 'post.title', 'post.text', 'post.author', 'post.created_at'])
            ->all();

        foreach ($posts as $post) {
            $comments = Comment::findAll(['idpost' => $post->id]);
            $post['comment'] = $comments;
        }

        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $posts;
    }

    public function actionFind()
    {
        $posts = Post::find()
            ->select(['post.id', 'post.title', 'post.text', 'post.author', 'post.created_at'])
            ->all();

        foreach ($posts as $post) {
            $comments = Comment::findAll(['idpost' => $post->id]);
            $post['comment'] = $comments;
        }

        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $posts;
    }
}