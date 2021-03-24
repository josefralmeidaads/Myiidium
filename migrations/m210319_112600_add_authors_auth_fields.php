<?php

use yii\db\Migration;

/**
 * Class m210319_112600_add_authors_auth_fields
 */
class m210319_112600_add_authors_auth_fields extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // $this->addColumn('{{authors}}', '[[password]]', $this->string(60)->notNull()->after('email'));
        // $this->addColumn('{{authors}}', '[[access_token]]', $this->string(100)->unique()->defaultValue(null)->after('password'));
        // $this->addColumn('{{authors}}', '[[auth_key]]', $this->string(100)->unique()->defaultValue(null)->after('access_token'));

        $authors = $this->getDb()
        ->createCommand('select * from {{authors}}')
        ->queryAll();

        $password = Yii::$app->getSecurity()->generatePasswordHash('123456');

        foreach($authors as $author){
            $this->update('{{authors}}', ['password' => $password, 'auth_key' => Yii::$app->security->generateRandomString()],
            "id = {$author['id']}"
            );
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{authors}}', '[[auth_key]]');
        $this->dropColumn('{{authors}}', '[[access_token]]');
        $this->dropColumn('{{authors}}', '[[password]]');

        return false;
    }
}
