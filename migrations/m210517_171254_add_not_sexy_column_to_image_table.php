<?php

use yii\db\Migration;

/**
 * Handles adding not_sexy to table `image`.
 */
class m210517_171254_add_not_sexy_column_to_image_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%image}}', 'not_sexy', $this->integer()->defaultValue(0)->after('likes'));

        $this->createIndex('{{%image_not_sexy_index}}', '{{%image}}', 'not_sexy');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%image}}', 'not_sexy');
    }
}
