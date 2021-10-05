<?php

use yii\db\Migration;

/**
 * Handles the creation of table `comment_vote`.
 */
class m211001_190933_create_comment_vote_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%comment_vote}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'comment_id' => $this->integer(),
            'type' => $this->string(10)->notNull(),

            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->null()
        ]);

        $this->createIndex('{{%comment_vote_created_at_index}}', '{{%comment_vote}}', 'created_at');
        $this->createIndex('{{%comment_vote_updated_at_index}}', '{{%comment_vote}}', 'updated_at');
        $this->createIndex('{{%comment_vote_type_index}}', '{{%comment_vote}}', 'type');

        $this->addForeignKey('{{%comment_vote_user_id_fk}}', '{{%comment_vote}}', 'user_id', '{{%user}}', 'id', 'SET NULL', 'CASCADE');
        $this->addForeignKey('{{%comment_vote_comment_id_fk}}', '{{%comment_vote}}', 'comment_id', '{{%comment}}', 'id', 'SET NULL', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%comment_vote}}');
    }
}
