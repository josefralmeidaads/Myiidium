<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    
    $guestItems = [
          ['label' => 'Login', 'url' => ['/myiidium/login']],
    ];

    $privateItems = [
        ['label' => 'Meus Artigos', 'url' => ['/articles']],
        ['label' => 'Perfil', 'url' => ['/myiidium/profile/'.(Yii::$app->getUser()->isGuest ? '' : Yii::$app->getUser()->identity->id).'/'.( Yii::$app->getUser()->isGuest ? '' : Yii::$app->getUser()->identity->name)]],
        ['label' => 'Logout ('.(Yii::$app->getUser()->isGuest ? '' : Yii::$app->getUser()->identity->name).')', 'url' => ['/myiidium/logout']],
    ];

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => array_merge(
            [['label' => 'Home', 'url' => ['/myiidium']]],
            (Yii::$app->getUser()->isGuest ? $guestItems : $privateItems)
        ),
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
