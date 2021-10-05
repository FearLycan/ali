<?php

use yii\db\Migration;

/**
 * Handles the creation of table `comment`.
 */
class m210929_125744_create_comment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%comment}}', [
            'id' => $this->primaryKey(),
            'content' => $this->text()->notNull(),
            'author_id' => $this->integer()->null(),
            'image_id' => $this->integer()->null(),
            'parent_id' => $this->integer()->null(),
            'status' => $this->smallInteger()->defaultValue(1),

            'up_vote' => $this->integer()->defaultValue(0),
            'down_vote' => $this->integer()->defaultValue(0),

            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->null()
        ]);

        $this->createIndex('{{%comment_created_at_index}}', '{{%comment}}', 'created_at');
        $this->createIndex('{{%comment_updated_at_index}}', '{{%comment}}', 'updated_at');

        $this->addForeignKey('{{%comment_author_id_fk}}', '{{%comment}}', 'author_id', '{{%user}}', 'id', 'SET NULL', 'CASCADE');
        $this->addForeignKey('{{%comment_parent_id_fk}}', '{{%comment}}', 'parent_id', '{{%comment}}', 'id', 'SET NULL', 'CASCADE');
        $this->addForeignKey('{{%comment_image_id_fk}}', '{{%comment}}', 'image_id', '{{%image}}', 'id', 'SET NULL', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%comment}}');
    }
}
