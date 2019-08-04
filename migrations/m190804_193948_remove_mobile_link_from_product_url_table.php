<?php

use yii\db\Migration;

/**
 * Class m190804_193948_remove_mobile_link_from_product_url_table
 */
class m190804_193948_remove_mobile_link_from_product_url_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('{{%product_url}}', 'mobile_url');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('{{%product_url}}', 'mobile_url', $this->string()->null()->after('url'));
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190804_193948_remove_mobile_link_from_product_url_table cannot be reverted.\n";

        return false;
    }
    */
}
