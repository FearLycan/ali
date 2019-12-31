<?php

use yii\db\Migration;

/**
 * Handles the creation of table `visitors`.
 */
class m191230_082109_create_visitors_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%visitor}}', [
            'id' => $this->primaryKey(),
            'ip' => $this->string(15)->notNull(),
            'country' => $this->string()->null(),
            'count' => $this->integer()->defaultValue(0),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->null()
        ]);

        $this->createIndex('{{%visitor_ip_index}}', '{{%visitor}}', 'ip');
        $this->createIndex('{{%visitor_country_index}}', '{{%visitor}}', 'country');

        $this->createIndex('{{%visitor_created_at_index}}', '{{%visitor}}', 'created_at');
        $this->createIndex('{{%visitor_updated_at_index}}', '{{%visitor}}', 'updated_at');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%visitor}}');
    }
}
