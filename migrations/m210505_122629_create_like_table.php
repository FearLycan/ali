<?php

use yii\db\Migration;

/**
 * Handles the creation of table `like`.
 */
class m210505_122629_create_like_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%like}}', [
            'user_id' => $this->integer(),
            'image_id' => $this->integer(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);

        $this->addPrimaryKey('{{%like_pk}}', '{{%like}}', ['user_id', 'image_id']);
        $this->addForeignKey('{{%user_id_fk}}', '{{%like}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('{{%image_id_fk}}', '{{%like}}', 'image_id', '{{%image}}', 'id', 'CASCADE', 'CASCADE');

        $this->createIndex('{{%like_created_at_index}}', '{{%like}}', 'created_at');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('like');
    }
}
