<?php 
  namespace app\forms;

use yii\base\Model;
use yii\db\ActiveRecord;

class ArticlesForm extends Model
  {
    public $title;
    public $category;
    public $short_description;
    public $author_name;
    public $author_email;
    public $published_date;
    public $created_at;
    public $content;
    public $likes;
    public $status;

    const CATEGORY_PHP = 1;
    const CATEGORY_GIT = 2;
    const CATEGORY_JAVASCRIPT = 3;

    const STATUS_DRAFT = 1;
    const STATUS_REVIEW = 2;
    const STATUS_PUBLISHED = 3;

    public function rules()
    {
      return [
        [['title', 'category', 'short_description', 'author_name', 'author_email', 'content', 'likes', 'created_at', 'status'], 'required'],
        [['title','short_description', 'author_name',], 'string', 'max' => 60],
        ['category', 'in', 'range' => array_keys(static::getCategoryList())],
        ['status', 'in', 'range' => array_keys(static::getStatusList())],
        ['author_email', 'email'],
        ['published_date', 'date', 'format' => 'php:Y-m-d'],
        ['created_at', 'datetime', 'format' => 'php:Y-m-d H:m:s'],
        [['likes', 'status', 'category'], 'integer']
      ];
    }

    public function attributeLabels()
    {
      return [
        'title' => 'Título',
        'category' => 'Categoria',
        'short_description' => 'Descrição Curta',
        'author_name' => 'Nome do Autor',
        'author_email' => 'Email do Autor',
        'published_date' => 'Data de Publicação',
        'created_at' => 'Data de Criação',
        'content' => 'Conteúdo',
        'likes' => 'Curtidas',
        'Status' => 'Status',
      ];
    }

    public static function getCategoryList(): array
    {
      return [
        static::CATEGORY_PHP => 'PHP',
        static::CATEGORY_GIT => 'GIT',
        static::CATEGORY_JAVASCRIPT => 'JAVASCRIPT',
      ];
    }

    public static function getStatusList(): array
    {
      return [
        static::STATUS_DRAFT => 'Rascunho',
        static::STATUS_REVIEW => 'Revisão',
        static::STATUS_PUBLISHED => 'Publicado',
      ];
    }

    public function getCategoryName(): string
    {
      return static::getCategoryList()[$this->category];
    }

    public function getStatusName(): string
    {
      return static::getStatusList()[$this->status];
    }
  }
?>