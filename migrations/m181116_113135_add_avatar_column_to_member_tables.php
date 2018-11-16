<?php

use yii\db\Migration;

/**
 * Class m181116_113135_add_avatar_column_to_member_tables
 */
class m181116_113135_add_avatar_column_to_member_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%member}}', 'avatar', $this->string()->null()->after('type'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%member}}', 'avatar');
    }
}
