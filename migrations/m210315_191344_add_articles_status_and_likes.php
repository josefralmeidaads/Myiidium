<?php

use yii\db\Migration;

/**
 * Class m210315_191344_add_articles_status_and_likes
 */
class m210315_191344_add_articles_status_and_likes extends Migration
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
        echo "m210315_191344_add_articles_status_and_likes cannot be reverted.\n";

        return false;
    }

    
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $enumColumn = $this->getDb()
        ->getSchema()
        ->createColumnSchemaBuilder("ENUM('1', '2', '3')");

        $this->addColumn('{{articles}}', 'status', $enumColumn->notNull()->defaultValue(1)->after('author_name'));
        $this->addColumn('{{articles}}', 'likes', $this->integer()->notNull()->defaultValue(0)->after('author_name'));
    }

    public function down()
    {
        $this->dropColumn('{{articles}}', 'status');
        $this->dropColumn('{{articles}}', 'likes');

        return false;
    }
    
}
