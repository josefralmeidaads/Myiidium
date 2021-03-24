<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%article}}`.
 */
class m210315_185625_create_article_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $category = $this->getDb()->getSchema()
        ->createColumnSchemaBuilder("ENUM('1', '2', '3')");

        $this->createTable('{{articles}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(60)->notNull(),
            'category' => $category->notNull(),
            'short_description' => $this->string(60)->notNull(),
            'author_name' => $this->string(60)->notNull(),
            'author_email' => $this->string(60)->notNull(),
            'published_date' => $this->date()->defaultValue(null),
            'created_at' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP'),
            'content' => $this->text()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{articles}}');
    }
}
