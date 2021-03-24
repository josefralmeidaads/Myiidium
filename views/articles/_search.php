<?php 
   namespace app\articles\view;

use app\models\Author;
use app\models\Category;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

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
