<?php

use yii\db\Migration;

/**
 * Class m181113_094111_add_columns_to_image_table
 */
class m181113_094111_add_columns_to_image_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%image}}', 'file', $this->string()->null()->after('status'));
        $this->addColumn('{{%image}}', 'slug', $this->string()->null()->after('file'));

        $this->createIndex('{{%slug_image_index}}', '{{%image}}', 'slug');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('{{%slug_image_index}}', '{{%image}}');
        $this->dropColumn('{{%image}}', 'file');
        $this->dropColumn('{{%image}}', 'slug');
    }

}
