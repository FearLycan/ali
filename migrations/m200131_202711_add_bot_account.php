<?php

use yii\db\Migration;
use app\models\User;

/**
 * Class m200131_202711_add_bot_account
 */
class m200131_202711_add_bot_account extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('{{%user}}',
            [
                'id' => User::BOT_SPACE_BOB_ID,
                'name' => 'Space Bob',
                'slug' => 'space-bob',
                'email' => 'space-bob@space-bob.com',
                'password' => 'xyz',
                'role' => User::ROLE_BOT,
                'status' => User::STATUS_ACTIVE,
                'auth_key' => 'abc',
            ]);

        $this->update('{{%product_url}}',['author_id' => User::BOT_SPACE_BOB_ID]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200131_202711_add_bot_account cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200131_202711_add_bot_account cannot be reverted.\n";

        return false;
    }
    */
}
