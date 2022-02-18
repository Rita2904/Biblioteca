<?php

namespace frontend\controllers;

use common\models\Book;
use common\models\Comment;
use common\models\Order;
use common\models\Post;
use Yii;
use yii\rest\ActiveController;
use yii\web\Response;

class CommentsController extends ActiveController
{
    public $modelClass = 'common\models\Comment';

    //listar todos os comentários por post
    public function actionList($id)
    {
        $request = Yii::$app->request;
        $posts = Post::find()
            ->select(['post.id'])
            ->where(['post.id'=>$id])
            ->all();

        foreach ($posts as $p) {
            $comments = Comment::findAll(['idpost' => $p->id]);
            $p['comment'] = $comments;
        }

        $comments = Comment::find()
            ->select(['comment.text', 'comment.author as Autor'])
            ->from(['comment'])
            ->where(['idpost'=>$p->id])
            ->asArray()
            ->all();

        Yii::$app->response->format = Response::FORMAT_JSON;
        return $comments;
    }

    //criar novo comentário
    public function actionComment()
    {
        $request = Yii::$app->request;
        $date =  date("Y/m/d");
        if($request->isPost) {
            $comment = new Comment();
            $comment->text = $request->post("text");
            $comment->author = $request->post("author");
            $comment->created = $date;
            $comment->idpost = $request->post("idpost");
            return $comment->save();
        }
        Yii::$app->response->format = Response::FORMAT_JSON;
    }

    //listar todos os comentários
    public function actionAll()
    {
        $request = Yii::$app->request;
        if($request->isPost) {
            $comments = Comment::find()
                ->select(['comment.id', 'comment.text', 'comment.author', 'comment.idpost'])
                ->all();

            return $comments;
        }
        Yii::$app->response->format = Response::FORMAT_JSON;
    }

    //apagar comentário
    public function actionDelete($id)
    {
        $request = Yii::$app->request;
        if($request->isPost) {
            $comment = Comment::find()
                ->where(['comment.id'=>$id]);
            return $comment->createCommand()->delete($comment);
        }
        Yii::$app->response->format = Response::FORMAT_JSON;
    }

    //editar comentário
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        if($request->isPost) {
            $comment = Comment::find()
                ->where(['comment.id'=>$id]);
            return $comment->createCommand()->update("comment", ["comment.idpost"=>$request->post("idpost")]);
        }
        Yii::$app->response->format = Response::FORMAT_JSON;

    }

}