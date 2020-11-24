<?php

use yii\db\Migration;

/**
 * Class m200131_201434_add_author_id_to_product_url_table
 */
class m200131_201434_add_author_id_to_product_url_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%product_url}}', 'author_id', $this->integer()->null()->after('status'));

        $this->addForeignKey('{{%product_url_author_id_fk}}', '{{%product_url}}', 'author_id', '{{%user}}', 'id', 'SET NULL', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%product_url}}', 'author_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200131_201434_add_author_id_to_product_url_table cannot be reverted.\n";

        return false;
    }
    */
}
