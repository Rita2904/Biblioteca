<?php

namespace frontend\controllers;

use common\models\Book;
use common\models\Comment;
use common\models\Order;
use Yii;
use yii\rest\ActiveController;
use yii\web\Response;

class OrdersController extends ActiveController
{
    public $modelClass = 'common\models\Order';

    //listar todos os pedidos
    public function actionList()
    {
        $order = Order::find()
            ->select(['order.id', 'order.descricao', 'order.data', 'order.quantidade', 'order.idbook', 'order.nome', 'order.email', 'order.prazo'])
            ->from(['order'])
            ->asArray()
            ->all();

        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $order;
    }

    //novo pedido
    public function actionOrder()
    {
        $request = Yii::$app->request;
        $date =  date("Y/m/d");
        //$title = $request->post('descricao');
        if($request->isPost) {
            $order = new Order();
            $order->nome = $request->post("nome");
            $order->descricao = $request->post("descricao");
            $order->data = $date;
            $book = Book::findOne(['book.titulo'=> $order->descricao]);
            $order->idbook = $book->id;
            $order->email = $request->post("email");
            return $order->save();
        }
        Yii::$app->response->format = Response::FORMAT_JSON;
    }

    //editar pedido
    /**
     * @throws \yii\db\Exception
     */
    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        $date =  date("Y/m/d");
            $order = Order::find()
            ->where(['order.id'=> $id]);
            return $order->createCommand()->update('order', ['prazo'=>$request->post('prazo')])
            ->execute();
        Yii::$app->response->format = Response::FORMAT_JSON;
    }

    //apagar pedido
    public function actionDelete($id)
    {
        $request = Yii::$app->request;
        if($request->isPost) {
            $order = Order::find()
                ->where(['order.id'=>$id]);
            return $order->createCommand()->delete($order);
        }
        Yii::$app->response->format = Response::FORMAT_JSON;
    }

}