<?php
  /** @var yii\web\View $this */
  /** @var yii\bootstrap\ActiveForm $form */
  /** @var app\models\LoginForm $loginForm */
  namespace app\myiidium\login;

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = 'Identificação';
?>

<div class="site-login">
  <h1><?= Html::encode($this->title) ?></h1>

  <p>Por favor, preencha os seguintes campos para fazer o login:</p>

  <?php $form = ActiveForm::begin([
    'id' => 'login-form',
    'layout' => 'horizontal',
    'fieldConfig' => [
      'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
      'labelOptions' => ['class' => 'col-lg-1 control-label'],
    ],
  ]) ?>

  <?= $form->field($loginForm, 'email')->textInput(['autofocus' => true, 'placeholder' => 'user@gmail.com']) ?>
  <?= $form->field($loginForm, 'password')->passwordInput(['placeholder' => 'Digite sua senha']) ?>
  <?= $form->field($loginForm, 'rememberMe')->checkbox([
    'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
  ]) ?>

  <div class="form-group">
    <div class="col-lg-offset-1 col-lg-11">
      <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
    </div>
  </div>

  <?php $form = ActiveForm::end() ?>
</div>