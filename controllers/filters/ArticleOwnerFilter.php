<?php 
  namespace app\controllers\filters;

use app\models\Articles;
use Yii;
use yii\base\ActionFilter;
use yii\web\ForbiddenHttpException;

class ArticleOwnerFilter extends ActionFilter
{
  public function beforeAction($action)
  {
    $articleId = (int)Yii::$app->getRequest()->get('id');
    $loggedAuthorId = (int)Yii::$app->getUser()->identity->id;

    $isValid = Articles::validateArticleOwner($articleId, $loggedAuthorId);

    if(!$isValid){
      throw new ForbiddenHttpException('Você não tem acesso a este registro', 404);
    }

    return true;
  }

}
?>