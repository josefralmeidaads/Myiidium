<?php 
namespace app\controllers\filters;

use Yii;
use yii\base\ActionFilter;

class FirstActionFilter extends ActionFilter
{
  public function beforeAction($action)
  {
    Yii::warning('Executando before action', __CLASS__);
    return true;
  }

  public function afterAction($action, $result)
  {
    Yii::warning('Executando AfterAction', __CLASS__);
    return $result;
  }
}
?>