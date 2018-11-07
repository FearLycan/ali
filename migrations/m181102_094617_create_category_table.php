<?php

use yii\db\Migration;

/**
 * Handles the creation of table `category`.
 */
class m181102_094617_create_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'parent_id' => $this->integer()->notNull(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->null()
        ]);

        $this->createIndex('{{%product_created_at_index}}', '{{%category}}', 'created_at');
        $this->createIndex('{{%product_updated_at_index}}', '{{%category}}', 'updated_at');

        $this->insert('{{%category}}', ['name' => 'Women\'s Clothing & Accessories', 'parent_id' => \app\models\Category::BASE_CATEGORY]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%category}}');
    }
}
