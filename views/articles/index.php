<?php
/**  @var yii\web\View $this*/

use app\models\Articles;
use app\models\Author;
use app\models\Category;
use yii\data\ActiveDataProvider;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**  @var app\forms\ArticlesSearchForm $searchForm*/
/**  @var array $categories*/
/**  @var array $authors*/
/**  @var ActiveDataProvider $dataProviders*/
?>

<?= $this->render('_search', ['searchForm' => $searchForm]) ?>

<hr/>
<div class="text-right">
	<?= Html::a('<i class="glyphicon glyphicon-plus-sign"></i> Novo Artigo', ['create'], ['class' => 'btn btn-success'])?>
</div>

<div>
    <?= GridView::widget([
			'dataProvider' => $dataProviders,
			'columns' => [
				[
					'attribute' => 'id',
					'headerOptions' => ['style' => 'text-align:center'],
					'contentOptions' => ['style' => 'text-align:center'],
				],
				[
					'attribute' => 'category_id',
					'headerOptions' => ['style' => 'text-align:center'],
					'contentOptions' => ['style' => 'text-align:center'],
					'content' => function(Articles $articles, $key, $index, $column){
						return $articles->category->name;
					}
				],
				[
					'attribute' => 'title',
				],
				[
					'attribute' => 'created_at',
					'format' => ['datetime', 'php: d/m/Y H:i:s',],
				],
				[
					'attribute' => 'status',
					'content' => function(Articles $articles, $key, $index, $column){
						return $articles->getStatusName();
					}
				],
				[
					'class' => ActionColumn::class,
					'header' => 'Ações',
					'headerOptions' => ['style' => 'text-align:center'],
					'contentOptions' => ['style' => 'text-align:center'],
				]
			],
		]) ?>
</div>



