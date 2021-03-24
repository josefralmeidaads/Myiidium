<?php 
  /** @var \yii\web\View $this */
  /** @var \app\models\Articles $model */
  /** @var ActiveForm $form */

use app\models\Articles;
use app\models\Author;
use app\models\Category;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin() ?>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h2 class="panel-title"><i class="glyphicon glyphicon-file"></i>Dados Gerais</h2>
    </div>
    <div class="panel-body">
      <div class="row">
        <div class="col-md-3"><?= $form->field($model, 'title') ?></div>
        <div class="col-md-6"><?= $form->field($model, 'short_description') ?></div>
        <div class="col-md-3">
          <?= $form->field($model, 'category_id')->dropDownList(Category::getOptions(), [
            'prompt' => ':: SELECIONE ::',
          ]) ?>
        </div>
      </div>
        
      <div class="row">
        <div class="col-md-12">
          <?= $form->field($model, 'content')->textarea([
            'rows' => 10,
          ]) ?>
        </div>
      </div>

      <div class="row">
        <div class="col-md-2">
          <?= $form->field($model, 'status')->dropDownList(Articles::getStatusList()) ?>
        </div>
      </div>
    </div>
  </div>

  <div class="form-gourp">
    <?= Html::a('<i class="glyphicon glyphicon-chevron-left"></i>Voltar', ['index'],["class" => "btn btn-default btn-lg"]) ?>
    <?= Html::submitButton('<i class="glyphicon glyphicon-floppy-save"></i> Salvar', ["class" => "btn btn-primary btn-lg"]) ?>
  </div>
<?php $form = ActiveForm::end() ?>