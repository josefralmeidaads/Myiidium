<?php 
  namespace app\forms;

use app\models\Articles;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\db\ActiveQuery;

class ArticlesSearchForm extends Model
{
    public $category;
    public $author;
    public $term;
    public $status;

    public function rules()
    {
      return [
        [['category', 'author', 'status'], 'integer'],
        ['term', 'string', 'max' => 60],
        ['status', 'in', 'range' => array_keys(Articles::getStatusList())],
      ];
    }

    public function attributeLabels()
    {
      return [
        'category' => 'Categoria',
        'author' => 'Autor',
        'term' => 'Termo',
      ];
    }

    public function search(array $params)
    {
      // echo '<pre>'; print_r($params);die;

      $query = Articles::find();

      $dataProvider = new ActiveDataProvider([
        'query' => $query,
        'pagination' => [
          'pageSize' => 5,
        ],
      ]);

      if(!$this->load($params) || !$this->validate()){
        return $dataProvider;
      }

      if(!empty($this->term)){
        $query->where(['like', '[[title]]', $this->term])
        ->orFilterWhere(['like', '[[short_description]]', $this->term])
        ->orFilterWhere(['like', '[[content]]', $this->term]);
      }

      $query->andFilterWhere([
        'category_id' => $this->category,
        'author_id' => $this->author,
        'status' => $this->status,
      ]);

      // echo '<pre>'; print_r($query);die;

      return $dataProvider;
    }
}
?>