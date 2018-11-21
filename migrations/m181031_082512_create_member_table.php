<?php

use app\models\Member;
use yii\db\Migration;

/**
 * Handles the creation of table `member`.
 */
class m181031_082512_create_member_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%member}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'ali_member_id' => $this->string()->notNull(),
            'country_code' => $this->string(10)->notNull(),
            'status' => $this->smallInteger()->defaultValue(1),
            'type' => $this->smallInteger()->defaultValue(1),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->null()
        ]);

        $this->createIndex('{{%member_created_at_index}}', '{{%member}}', 'created_at');
        $this->createIndex('{{%member_updated_at_index}}', '{{%member}}', 'updated_at');
        $this->createIndex('{{%member_ali_member_id_index}}', '{{%member}}', 'ali_member_id');
        $this->createIndex('{{%member_status_index}}', '{{%member}}', 'status');
        $this->createIndex('{{%member_type_index}}', '{{%member}}', 'type');

        $this->insert('{{%member}}', [
            'id' => 0,
            'name' => 'AliExpress Shopper',
            'ali_member_id' => 'XYZ',
            'country_code' => 'ALL',
            'status' => Member::STATUS_ACTIVE,
            'type' => Member::TYPE_NORMAL
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%member}}');
    }
}
