<?php

namespace app\controllers;

use app\controllers\filters\ArticleOwnerFilter;
use app\forms\ArticlesSearchForm;
use app\models\Articles;
use Yii;
use yii\filters\AccessControl;

class ArticlesController extends \yii\web\Controller
{
    public $layout = 'myiidium';

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'articleOwnerFilter' => [
                'class' => ArticleOwnerFilter::class,
                'only' => ['update', 'delete', 'view'],
            ],
        ];
    }

    public function actionIndex()
    {
        $articleSearchForm = new ArticlesSearchForm();
        $params = Yii::$app->getRequest()->get();
        $params['ArticlesSearchForm']['author'] = Yii::$app->getUser()->identity->id;
        $dataProviders = $articleSearchForm->search($params);

        return $this->render('index', [
            'searchForm' => $articleSearchForm,
            'dataProviders' => $dataProviders,
        ]);
    }

    public function actionCreate()
    {
        $articles = new Articles();
        $post = Yii::$app->getRequest()->post();

        if($articles->load($post)){
            return $this->save($articles);
        }

        return $this->render('create', ['model' => $articles]);
    }

    public function actionUpdate(int $id)
    {
        $articles = Articles::findOne($id);

        if(!$articles){
            Yii::$app->getSession()->addFlash('info', 'Artigo não existe!');
            $this->redirect(['index']);
        }

        $post = Yii::$app->getRequest()->post();

        if($articles->load($post)){
            return $this->save($articles);
        }

        return $this->render('update', ['model' => $articles]);
    }

    private function save(Articles $model)
    {
        $msg = ($model->isNewRecord ? 'cadastrado' : 'atualizado');
        $model->author_id = Yii::$app->getUser()->identity->id;

        if(!$model->validate()){
            Yii::$app->getSession()->addFlash('error', $model->getErrorsToString());
        }

        if(!$model->save()){
            Yii::$app->getSession()->addFlash('error', $model->getErrorsToString());
        }

        Yii::$app->getSession()->addFlash('success', 'Artigo '.$msg.' com sucesso!');

        return $this->redirect(['view', 'id' => $model->id]);
    }

    public function actionView(int $id)
    {
        $articles = Articles::findOne($id);

        if(!$articles){
          Yii::$app->getSession()->addFlash('info', 'Nenhum artigo encontrado!');
          $this->redirect(['index']);
        }

        return $this->render('view', ['model' => $articles]);
    }

    public function actionDelete(int $id){
        $article = Articles::findOne($id);

        if(!$article){
            Yii::$app->getSession()->addFlash('info', 'Nenhum artigo encontrado!');
            return $this->redirect(['index']); 
        }

        if(!$article->delete()){
            Yii::$app->getSession()->addFlash('error', $article->getErrorsToString());
            return $this->redirect(['index']); 
        }

        Yii::$app->getSession()->addFlash('success', 'Artigo deletado com sucesso!');

        return $this->redirect(['index']);
    }

}
