<?php

use yii\db\Migration;

/**
 * Class m210324_112055_add_articles_slug_column
 */
class m210324_112055_add_articles_slug_column extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210324_112055_add_articles_slug_column cannot be reverted.\n";

        return false;
    }
}
