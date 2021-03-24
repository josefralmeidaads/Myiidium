<?php

use yii\db\Migration;

/**
 * Class m210316_122633_add_articles_foreignkeys
 */
class m210316_122633_add_articles_foreignkeys extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('{{articles}}', '[[category]]');
        $this->dropColumn('{{articles}}', '[[author_name]]');
        $this->dropColumn('{{articles}}', '[[author_email]]');

        $this->addColumn('{{articles}}', '[[category_id]]', $this->integer()->notNull()->after('id'));
        $this->addColumn('{{articles}}', '[[author_id]]', $this->integer()->notNull()->after('id'));

        $this->update('{{articles}}', ['[[category_id]]' => 1, '[[author_id]]'=> 1]);

        $this->addForeignKey('fk_articles_category_id', '{{articles}}', '[[category_id]]', '{{categories}}', '[[id]]', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_articles_author_id', '{{articles}}', '[[author_id]]', '{{authors}}', '[[id]]', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_articles_category_id', '{{articles}}');
        $this->dropForeignKey('fk_articles_author_id', '{{articles}}');

        $this->dropColumn('{{articles}}', '[[category_id]]');
        $this->dropColumn('{{articles}}', '[[author_id]]');

        $enumColumn = $this->getDb()->getSchema()
        ->createColumnSchemaBuilder("ENUM('1', '2', '3')");

        $this->addColumn('{{articles}}', '[[category]]', $enumColumn->notNull()->after('title'));
        $this->addColumn('{{articles}}', '[[author_name]]', $this->string(60)->notNull()->after('short_description'));
        $this->addColumn('{{articles}}', '[[author_email]]', $this->string(60)->notNull()->after('author_name'));

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        
    }

    public function down()
    {
        echo "m210316_122633_add_articles_foreignkeys cannot be reverted.\n";

        return false;
    }*/
    
}
