<?php 
  /** @var yii\web\View $this */
  /** @var app\models\Articles $model */

use app\models\Articles;
use yii\helpers\Html;
use yii\widgets\DetailView;

?>

<h1>Visualizando Artigo: <?= $model->title ?></h1>

<div class="text-right">
  <div class="form-group">
    <?= Html::a('<i class="glyphicon glyphicon-chevron-left"></i> Voltar', ['index'], ['class' => 'btn btn-default']) ?>
    <?= Html::a('<i class="glyphicon glyphicon-pencil"></i> Editar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    <?= Html::a('<i class="glyphicon glyphicon-plus-sign"></i> Novo Artigo', ['create'], ['class' => 'btn btn-success']) ?>
  </div>
</div>

<?= DetailView::widget([
  'model' => $model,
  'attributes' => [
    'title', 
    'slug',
    [
      'label' => $model->getAttributeLabel('category_id'),
      'value' => $model->category->name,
    ],
    'short_description',
    [
      'label' => $model->getAttributeLabel('author_id'),
      'value' => $model->author->name,
    ],
    [
      'label' => $model->author->getAttributeLabel('email'),
      'format' => 'email',
      'value' => $model->author->email,
    ],
    'content', 
    'likes', 
    [
      'label' => $model->getAttributeLabel('status'),
      'value' => $model->getStatusName(),
    ], 
    [
      'label' => $model->getAttributeLabel('published_date'),
      'format' => 'raw',
      'value' => function(Articles $model){
        return "<i class='glyphicon glyphicon-calendar'></i> {$model->published_date}";
      },
    ], 
    [
      'label' => $model->getAttributeLabel('created_at'),
      'format' => 'raw',
      'value' => function(Articles $model){
        return "<i class='glyphicon glyphicon-calendar'></i> {$model->created_at}";
      },
    ], 
    
    ]
]) ?>