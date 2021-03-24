<?php 
  namespace app\core\activeRecord;
use yii\helpers\ArrayHelper;

trait DropDownList
  {
    public static function getOptions(string $labelAttribute ='name', string $valueAttribute='id'):array
    {
      return ArrayHelper::map(static::findAll(['status' => 1]), $valueAttribute, $labelAttribute);
    }
  }
?>