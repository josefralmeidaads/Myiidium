<?php
/** @var app\forms\ArticlesSearchForm $searchForm */
/** @var yii\data\ActiveDataProvider $dataProvider */
use app\models\Articles;
use app\models\Category;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\ListView;

?>

<section>
<?php $form = ActiveForm::begin(['method' => 'get']) ?>
    <div class="row">
        <div class="col-md-5">
            <?= $form->field($searchForm, 'term')?>
        </div>
        <div class="col-md-5">
            <?= $form->field($searchForm, 'category')->dropDownList(Category::getOptions(), [
                'prompt' => ':: TODOS ::'
            ]) ?>
        </div>
        
        <div class="col-md-2">
            <div class="form-group">
        <label class="control-label">&nbsp;</label>
            <?= Html::submitButton('<i class="glyphicon glyphicon-search"></i>&nbsp; Buscar', [
                    'class' => 'btn btn-primary form-control'
            ]) ?>
            </div>
        </div>
    </div>
<?php ActiveForm::end()?>
</section>

<hr />

<?php echo ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_article',
]) ?>