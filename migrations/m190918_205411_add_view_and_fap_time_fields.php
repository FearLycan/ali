<?php

use yii\db\Migration;

/**
 * Class m190918_205411_add_view_and_fap_time_fields
 */
class m190918_205411_add_view_and_fap_time_fields extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        //table image
        $this->addColumn('{{%image}}', 'view', $this->integer()->null()->defaultValue(0)->after('slug'));
        $this->addColumn('{{%image}}', 'fap_time', $this->integer()->null()->defaultValue(0)->after('view'));

        $this->createIndex('{{%image_view_index}}', '{{%image}}', 'view');
        $this->createIndex('{{%image_fap_time_index}}', '{{%image}}', 'fap_time');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190918_205411_add_view_and_fap_time_fields cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190918_205411_add_view_and_fap_time_fields cannot be reverted.\n";

        return false;
    }
    */
}
