<?php

namespace frontend\controllers;

use common\models\Book;
use common\models\BookSearch;
use common\models\Livro;
use Yii;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\CreateBookForm;
use yii\web\UploadedFile;

/**
 * BookController implements the CRUD actions for Book model.
 */
class BookController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Book models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BookSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Book model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Book model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     * @throws ForbiddenHttpException
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can("bookManager")) {
            $model = new CreateBookForm();

            if ($this->request->isPost) {
                if ($model->load($this->request->post())) {
                    $book = new Book();
                    $model->imagem = UploadedFile::getInstance($model, 'imagem');
                    $imagePath = 'images/'.Yii::$app->security->generateRandomString(15).'.'.$model->imagem->extension;
                    $model->imagem->saveAs('../'.$imagePath);
                    $book->titulo = $model->titulo;
                    $book->autor = $model->autor;
                    $book->tema = $model->tema;
                    $book->editora = $model->editora;
                    $book->numeropaginas = $model->numeropaginas;
                    $book->isbn = $model->isbn;
                    $book->imagem = $imagePath;
                    if($book->validate()) {
                        $book->save();
                        return $this->redirect(['view', 'id' => $book->id]);
                    } else {
                        $errors = $book->errors;
                        var_dump($errors);
                        die();
                    }

                }
            }
            return $this->render('create', [
                'model' => $model,
            ]);
        } else {
            throw new ForbiddenHttpException();
        }

    }
// && $model->save()
    /**
     * Updates an existing Book model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if(Yii::$app->user->can("bookManager")) {
            $model = $this->findModel($id);

            if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        } else {
            throw new ForbiddenHttpException();
        }
    }

    /**
     * Deletes an existing Book model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Book model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Book the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Book::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }



}
