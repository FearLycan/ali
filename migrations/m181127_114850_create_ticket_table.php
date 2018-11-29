<?php

use yii\db\Migration;

/**
 * Handles the creation of table `ticket`.
 */
class m181127_114850_create_ticket_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%ticket}}', [
            'id' => $this->primaryKey(),
            'topic' => $this->smallInteger()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'type' => $this->smallInteger()->notNull(),
            'model_id' => $this->integer()->notNull(),
            'description' => $this->text()->notNull(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->null()
        ]);

        $this->createIndex('{{%ticket_created_at_index}}', '{{%ticket}}', 'created_at');
        $this->createIndex('{{%ticket_updated_at_index}}', '{{%ticket}}', 'updated_at');

        $this->createIndex('{{%ticket_status_index}}', '{{%ticket}}', 'status');
        $this->createIndex('{{%ticket_topic_index}}', '{{%ticket}}', 'topic');
        $this->createIndex('{{%ticket_type_index}}', '{{%ticket}}', 'type');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%ticket}}');
    }
}
