<?php

use yii\db\Migration;

/**
 * Class m200207_120948_add_description_columnt_to_user_table
 */
class m200207_120948_add_description_columnt_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'description', $this->text()->null()->after('avatar'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%user}}', 'description');
    }
}
