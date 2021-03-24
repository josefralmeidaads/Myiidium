<?php

namespace app\controllers;

use app\forms\ArticlesSearchForm;
use app\forms\LoginForm;
use app\models\Articles;
use app\models\Author;
use Yii;

class MyiidiumController extends \yii\web\Controller
{   
    public $layout = 'myiidium';

    public function actionIndex()
    {   
        $articleForm = new ArticlesSearchForm();
        $params = Yii::$app->getRequest()->get();
        $params['ArticlesSearchForm']['status'] = Articles::STATUS_PUBLISHED;
        $dataProvider = $articleForm->search($params);

        return $this->render('index', [
            'searchForm' => $articleForm,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionRead(int $id,string $slug)
    {
        $article = Articles::findOne([
            'id' => $id,
            'slug' => $slug,
            ]);
        if(!$article){
          Yii::$app->getSession()->addFlash('warning', 'Artigo requisitado não existe');
          return $this->redirect(['myiidium/index']);
        }

        return $this->render('read', ['article' => $article]);
    }

    public function actionLogin()
    {
        if(!Yii::$app->getUser()->isGuest){
          return $this->redirect(['myiidium/index']);
        }

        $loginForm = new LoginForm();
        $post = Yii::$app->getRequest()->post();

        // echo '<pre>'; print_r($post['LoginForm']); die;

        if($loginForm->load($post) && $loginForm->login()){
          return $this->redirect(['articles/index']);
        }

        $loginForm->password = null;

        return $this->render('login', ['loginForm' => $loginForm]);
    }

    public function actionLogout()
    {
        Yii::$app->getUser()->logout();
        return $this->redirect(['myiidium/index']);
    }

    public function actionProfile(int $id, string $name){
        $author = Author::findOne(['id' => $id, 'name' => $name]);
        $author->password = '';

        $post = Yii::$app->getRequest()->post();

        if($author->load($post) && $author->validate()){
          return $this->save($author);
        }

        if(!$author){
            Yii::$app->getSession()->addFlash('warning', 'Não existe Autor Logado!');
            $this->redirect(['myiidium/index']);
        }
        return $this->render('profile', ['author' => $author]);
    }

    private function save(Author $author){
        if(!empty($author->password)){
          $author->password = Yii::$app->getSecurity()->generatePasswordHash($author->password);
        }

        if(!$author->validate()){
            Yii::$app->getSession()->addFlash('error', $author->getErrorsToString());
        }

        if(!$author->save()){
            Yii::$app->getSession()->addFlash('error', $author->getErrorsToString());
        }

        Yii::$app->getSession()->addFlash('success', 'Autor atualizado com sucesso!');
        return $this->refresh();
    }
}
