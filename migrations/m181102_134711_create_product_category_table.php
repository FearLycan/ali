<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product_category`.
 */
class m181102_134711_create_product_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product_category}}', [
            'product_id' => $this->integer()->notNull(),
            'category_id' => $this->integer()->notNull(),
        ]);

        $this->addPrimaryKey('{{%product_category_pk}}', '{{%product_category}}', ['product_id', 'category_id']);
        $this->addForeignKey('{{%product_id_fk}}', '{{%product_category}}', 'product_id', '{{%product}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('{{%category_id_fk}}', '{{%product_category}}', 'category_id', '{{%category}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('{{%product_id_fk}}', '{{%product_category}}');
        $this->dropForeignKey('{{%category_id_fk}}', '{{%product_category}}');
        $this->dropTable('{{%product_category}}');
    }
}
