<?php 
    /** @var yii\web\View $this */
    /** @var app\models\Articles $article */
    namespace app\views\myiidium;
?>

<section>
    <article class="articles">
        <h2 class="category"><?= $article->category->name ?></h2>
        <h1 class="title"><a href=""><?= $article->title ?></a></h1>
        <ul>
            <li class="author"><i class="glyphicon glyphicon-user"></i> <?= $article->author->name ?></li>
            <li class="date"><i class="glyphicon glyphicon-calendar"></i> <?= $article->created_at ?></li>
            <li class="date"><i class="glyphicon glyphicon-calendar"></i> <?= $article->published_date ?></li>
            <li class="likes"><i class="glyphicon glyphicon-thumbs-up"></i> <?= $article->likes ?> like(s)</li>
        </ul>

        <div class="pull-right form-like">
            <form action="" method="post">
                <button type="submit" class="btn btn-success">
                    <i class="glyphicon glyphicon-thumbs-up"></i> Dá Like!
                </button>
            </form>
        </div>

        <hr />

        <div class="content">
            <?= $article->content ?>
        </div>
    </article>
</section>