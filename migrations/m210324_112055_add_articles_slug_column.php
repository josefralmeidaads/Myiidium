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
        $this->addColumn('{{articles}}', '[[slug]]', $this->string(60)->after('[[title]]'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{articles}}', '[[slug]]');
    }
}
