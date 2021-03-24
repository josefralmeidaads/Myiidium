<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%categories_categories}}`.
 */
class m210316_120405_create_categories_categories_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{categories}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(60)->notNull(),
            'status' => $this->smallInteger(1)->notNull()->defaultValue(1),
        ]);
        $this->batchInsert('{{categories}}', ['name'], [
            ['PHP'], ['GIT'], ['Javascript']
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{categories}}');
    }
}
