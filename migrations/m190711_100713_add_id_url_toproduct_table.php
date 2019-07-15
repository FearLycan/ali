<?php

use yii\db\Migration;

/**
 * Class m190711_100713_add_id_url_toproduct_table
 */
class m190711_100713_add_id_url_toproduct_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%product}}', 'url_id', $this->integer()->null()->after('name'));

        $this->addForeignKey('{{%product_url_id_fk}}', '{{%product}}', 'url_id', '{{%product_url}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropPrimaryKey('{{%product_url_id_fk}}', '{{%product}}');
        $this->dropColumn('{{%product}}', 'url_id');
    }
}
