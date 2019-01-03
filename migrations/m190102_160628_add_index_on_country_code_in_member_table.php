<?php

use yii\db\Migration;

/**
 * Class m190102_160628_add_index_on_country_code_in_member_table
 */
class m190102_160628_add_index_on_country_code_in_member_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex('{{%member_country_code_index}}', '{{%member}}', 'country_code');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('{{%member_country_code_index}}', '{{%member}}');
    }
}
