<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product_url`.
 */
class m181031_095126_create_product_url_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product_url}}', [
            'id' => $this->primaryKey(),
            'url' => $this->string()->notNull(),
            'status' => $this->smallInteger()->defaultValue(1),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->null()
        ]);

        $this->createIndex('{{%product_url_created_at_index}}', '{{%product_url}}', 'created_at');
        $this->createIndex('{{%product_url_updated_at_index}}', '{{%product_url}}', 'updated_at');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product_url}}');
    }
}
