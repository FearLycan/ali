<?php

use yii\db\Migration;

/**
 * Handles adding avatar to table `user`.
 */
class m200131_213351_add_avatar_column_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'avatar', $this->string()->null()->after('status'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%user}}', 'avatar');
    }
}
