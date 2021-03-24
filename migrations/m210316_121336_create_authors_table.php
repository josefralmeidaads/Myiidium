<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%authors}}`.
 */
class m210316_121336_create_authors_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{authors}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(60)->notNull(),
            'email' => $this->string(60)->unique(),
            'status' => $this->smallInteger(1)->notNull()->defaultValue(1),
        ]);

        $this->batchInsert('authors', ['name', 'email'], [
            ['Felipe Lopes', 'felipe@email.com.br'],
            ['Mohamed Aladdin', 'aladdin@email.com.br'],
            ['Rudi Theunissen', 'rudi@email.com.br'],
            ['Igor Vorobiov', 'igor@email.com.br'],
            ['Samer Nyaupane', 'sameer@email.com.br'],
            ['Fredrik V. Morken', 'fredirk@email.com.br'],
            ['Preethi Kasireddy', 'preethi@email.com.br'],
            ['Lavio Copes', 'flavio@email.com.br'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{authors}}');
    }
}
