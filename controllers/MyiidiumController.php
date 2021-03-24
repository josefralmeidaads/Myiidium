<?php

namespace app\controllers;

use app\forms\ArticlesSearchForm;
use app\forms\LoginForm;
use app\models\Articles;
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

    public function actionRead()
    {
        return $this->render('read');
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
}
