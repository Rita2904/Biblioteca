<?php

namespace frontend\controllers;

use common\models\User;
use Yii;
use yii\base\Exception;
use yii\filters\VerbFilter;
use yii\rest\ActiveController;
use yii\web\BadRequestHttpException;
use yii\web\Response;


class UsersController extends ActiveController
{
    public $modelClass = 'common\models\User';

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                        'update' => ['PUT'],
                    ],
                ],
            ]
        );
    }

/*    public function actions()
    {
        $actions = parent::actions();
        unset($actions['update']);
        return $actions;
    } */


    //listar todos os utilizadores
    public function actionList()
    {
        $user = User::find()
            ->select(['user.username', 'user.email', 'user.morada'])
            ->from(['user'])
            ->asArray()
            ->all();

        Yii::$app->response->format = Response::FORMAT_JSON;
        return $user;
    }

    //procurar utilizador por nome
    public function actionFind($name)
    {
        $user = User::find()
            ->select(['user.username'])
            ->from(['user'])
            ->where(['username'=> $name])
            ->asArray()
            ->all();

        Yii::$app->response->format = Response::FORMAT_JSON;
        return $user;
    }

    //login
    public function actionLogin()
    {
        $request = Yii::$app->request;
        $query = User::find()
            ->select(['user.id', 'user.username', 'user.auth_key','user.access_token', 'user.email', 'user.morada','user.contacto'])
            ->from(['user'])
            ->where(['username'=> $request->post('username'), 'auth_key'=> $request->post('auth_key')])
            ->asArray()
            ->all();

        Yii::$app->response->format = Response::FORMAT_JSON;
        return $query;
    }

    //editar dados pessoais
    /**
     * @throws BadRequestHttpException
     */
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        //$id = $request->post("id");
        //return $id;
        if($request->isPut) {
            $request->post("username");
            $request->post("email");
            $request->post("contacto");
            $request->post("morada");
            $user = User::findOne([$id]);
            $user->save();
        } else {
            throw new BadRequestHttpException();
        }
        Yii::$app->response->format = Response::FORMAT_JSON;
        return $user;
    }

    //criar nova conta
    /**
     * @throws Exception
     */
    public function actionSignup()
    {
        $request = Yii::$app->request;
        if($request->isPost) {
            $user = new User();
            $user->username = $request->post("username");
            $user->auth_key = $request->post("auth_key");
            $user->access_token = Yii::$app->security->generateRandomString();
            $user->email = $request->post("email");
            $hash = Yii::$app->getSecurity()->generatePasswordHash("auth_key");
            $user->password_hash = $hash;
            return $user->save();
        }
        Yii::$app->response->format = Response::FORMAT_JSON;
        //return $user;
    }
}