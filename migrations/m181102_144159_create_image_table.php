<?php

use yii\db\Migration;

/**
 * Handles the creation of table `image`.
 */
class m181102_144159_create_image_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%image}}', [
            'id' => $this->primaryKey(),
            'url' => $this->string(),
            'product_id' => $this->integer()->notNull(),
            'member_id' => $this->integer()->notNull(),
            'status' => $this->smallInteger()->notNull(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->null()
        ]);

        $this->createIndex('{{%image_created_at_index}}', '{{%image}}', 'created_at');
        $this->createIndex('{{%image_updated_at_index}}', '{{%image}}', 'updated_at');

        $this->addForeignKey('{{%image_product_id_fk}}', '{{%image}}', 'product_id', '{{%product}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('{{%image_member_id_fk}}', '{{%image}}', 'member_id', '{{%member}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%image}}');
    }
}
