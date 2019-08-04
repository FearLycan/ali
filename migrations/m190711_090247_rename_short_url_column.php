<?php

use yii\db\Migration;

/**
 * Class m190711_090247_rename_short_url_column
 */
class m190711_090247_rename_short_url_column extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->renameColumn('{{%product_url}}', 'short_url', 'mobile_url');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->renameColumn('{{%product_url}}', 'mobile_url', 'short_url');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190711_090247_rename_short_url_column cannot be reverted.\n";

        return false;
    }
    */
}
