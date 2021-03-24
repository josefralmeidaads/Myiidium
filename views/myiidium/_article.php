<?php
  /** @var app\models\Articles $model */
  namespace app\views\myiidium;

use yii\helpers\Html;

?>
<section>
  <div class="col-md-6">
    <article class="articles">
      <h2 class="category"><?= $model->category->name ?></h2>
      <h1 class="title">
        <?= Html::a($model->title, ['myiidium/read/'. $model->id.'/'.$model->slug]) ?>
      </h1>
      <h3 class="subtitle"><?= $model->content ?></h3>

      <ul>
          <li class="author"><i class="glyphicon glyphicon-user"></i> <?= $model->author->name ?></li>
          <li class="date"><i class="glyphicon glyphicon-calendar"></i> <?= $model->created_at ?></li>
          <li class="date"><i class="glyphicon glyphicon-calendar"></i> <?= $model->published_date ?></li>
          <li class="likes"><i class="glyphicon glyphicon-thumbs-up"></i> <?= $model->likes ?> like(s)</li>
      </ul>
    </article>
  </div>
<section>