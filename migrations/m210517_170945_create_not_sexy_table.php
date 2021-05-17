<?php

use yii\db\Migration;

/**
 * Handles the creation of table `not_sexy`.
 */
class m210517_170945_create_not_sexy_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%not_sexy}}', [
            'user_id' => $this->integer(),
            'image_id' => $this->integer(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);

        $this->addPrimaryKey('{{%not_sexy_pk}}', '{{%not_sexy}}', ['user_id', 'image_id']);
        $this->addForeignKey('{{%not_sexy_user_id_fk}}', '{{%not_sexy}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('{{%not_sexy_image_id_fk}}', '{{%not_sexy}}', 'image_id', '{{%image}}', 'id', 'CASCADE', 'CASCADE');

        $this->createIndex('{{%not_sexy_created_at_index}}', '{{%not_sexy}}', 'created_at');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%not_sexy}}');
    }
}
