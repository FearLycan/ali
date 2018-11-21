<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product`.
 */
class m181031_083246_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'url' => $this->string()->notNull(),
            'ali_owner_member_id' => $this->string()->notNull(),
            'ali_product_id' => $this->string()->notNull(),
            'category_id' => $this->integer()->notNull(),
            'image' => $this->string()->notNull(),
            'status' => $this->smallInteger()->defaultValue(2),
            'type' => $this->smallInteger()->defaultValue(1),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->null(),
            'synchronized_at' => $this->timestamp()->null(),
        ]);

        $this->createIndex('{{%product_name_index}}', '{{%product}}', 'name');
        $this->createIndex('{{%product_ali_product_id_index}}', '{{%product}}', 'ali_product_id');

        $this->createIndex('{{%product_created_at_index}}', '{{%product}}', 'created_at');
        $this->createIndex('{{%product_updated_at_index}}', '{{%product}}', 'updated_at');
        $this->createIndex('{{%product_synchronized_at_index}}', '{{%product}}', 'synchronized_at');

        $this->addForeignKey('{{%product_category_id_fk}}', '{{%product}}', 'category_id', '{{%category}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product}}');
    }
}
