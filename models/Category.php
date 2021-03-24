<?php

namespace app\models;

use app\core\activeRecord\DropDownList;
use app\core\activeRecord\ErrorsToString;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "categories".
 *
 * @property int $id
 * @property string $name
 * @property int $status
 *
 * @property Articles[] $articles
 */
class Category extends ActiveRecord
{
    use DropDownList, ErrorsToString;
    
    const CATEGORY_PHP = 1;
    const CATEGORY_GIT = 2;
    const CATEGORY_JAVASCRIPT = 3;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{categories}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['status'], 'integer'],
            [['name'], 'string', 'max' => 60],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Categoria',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Articles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArticles()
    {
        return $this->hasMany(Articles::class, ['category_id' => 'id']);
    }
}
