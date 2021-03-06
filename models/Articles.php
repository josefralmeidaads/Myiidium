<?php

namespace app\models;

use app\core\activeRecord\ErrorsToString;
use Yii;
use yii\behaviors\SluggableBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "articles".
 *
 * @property int $id
 * @property int $author_id
 * @property int $category_id
 * @property string $title
 * @property string $slug
 * @property string $short_description
 * @property int $likes
 * @property string $status
 * @property string|null $published_date
 * @property string|null $created_at
 * @property string $content
 *
 * @property Author $author
 * @property Category $category
 */
class Articles extends ActiveRecord
{   
    use ErrorsToString;
    const STATUS_DRAFT = 1;
    const STATUS_REVIEW = 2;
    const STATUS_PUBLISHED = 3;
    /**
     * {@inheritdoc}
     */

     public function behaviors()
     {
         return [
             [
                'class' => SluggableBehavior::class,
                'attribute' => 'title',
                'slugAttribute' => 'slug',
             ],
         ];
     }

    public static function tableName()
    {
        return '{{articles}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['author_id', 'category_id', 'title', 'short_description', 'content'], 'required'],
            [['author_id', 'category_id', 'likes'], 'integer'],
            [['status', 'content'], 'string'],
            [['published_date', 'created_at'], 'safe'],
            ['published_date', 'date', 'format' => 'php:Y-m-d'],
            ['created_at', 'datetime', 'format' => 'php:Y-m-d H:i:s'],
            [['title', 'short_description', 'slug'], 'string', 'max' => 60],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => Author::class, 'targetAttribute' => ['author_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
            ['status', 'in', 'range' => array_keys(Articles::getStatusList())],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'author_id' => 'Autor',
            'category_id' => 'Categoria',
            'title' => 'T??tulo',
            'slug' => 'Slug',
            'short_description' => 'Descri????o Curta',
            'likes' => 'Curtidas',
            'status' => 'Status',
            'published_date' => 'Data de Cublica????o',
            'created_at' => 'Data de Cria????o',
            'content' => 'Conte??do',
        ];
    }

    /**
     * Gets query for [[Author]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(Author::class, ['id' => 'author_id']);
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    public static function getStatusList(): array
    {
      return [
        static::STATUS_DRAFT => 'Rascunho',
        static::STATUS_REVIEW => 'Revis??o',
        static::STATUS_PUBLISHED => 'Publicado',
      ];
    }

    public function getStatusName(): string
    {
      return static::getStatusList()[$this->status];
    }

    public static function validateArticleOwner(int $articleId, int $loggedAuthorId):bool 
    {
      $article = static::findOne(['id' => $articleId, 'author_id' => $loggedAuthorId]);

      if(!$article){
          return false;
      }
      return true;
    }

    public function isPublished():bool{
        return (int)$this->status === static::STATUS_PUBLISHED;
    }
}
