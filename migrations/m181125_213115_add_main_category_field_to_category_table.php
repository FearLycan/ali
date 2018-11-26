<?php

use yii\db\Migration;

/**
 * Class m181125_213115_add_main_category_field_to_category_table
 */
class m181125_213115_add_main_category_field_to_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%category}}', 'main_category', $this->string()->null()->after('parent_id'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%category}}', 'main_category');
    }

}
