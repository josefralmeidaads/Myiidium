<?php
  /** @var yii\web\View $this*/
  /** @var app\models\Author $author*/
  namespace app\views\myiidium;

use app\models\Articles;
use app\models\Category;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<h1>Perfil do Autor</h1>

<?php $form = ActiveForm::begin() ?>
<div class="panel panel-default">
    <div class="panel-heading">
      <h2 class="panel-title"><i class="glyphicon glyphicon-user"></i> Perfil do Autor</h2>
    </div>
    <div class="panel-body">
      <div class="row">
        <div class="col-md-3"><?= $form->field($author, 'name') ?></div>
        <div class="col-md-6"><?= $form->field($author, 'email') ?></div>
        <div class="col-md-3">
          <?= $form->field($author, 'password')->passwordInput() ?>
        </div>
      </div>
    </div>
  </div>

  <div class="form-gourp">
    <?= Html::a('<i class="glyphicon glyphicon-chevron-left"></i>Voltar', ['index'],["class" => "btn btn-default btn-lg"]) ?>
    <?= Html::submitButton('<i class="glyphicon glyphicon-floppy-save"></i> Salvar', ["class" => "btn btn-success btn-lg"]) ?>
  </div>
<?php $form = ActiveForm::end() ?>