<?php

use yii\db\Migration;

/**
 * Handles adding downloaded_at to table `image`.
 */
class m200101_191139_add_downloaded_at_column_to_image_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%image}}', 'downloaded_at', $this->timestamp()->null());

        $this->createIndex('{{%image_downloaded_at_index}}', '{{%image}}', 'downloaded_at');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('{{%image_downloaded_at_index}}','{{%image}}');
        $this->dropColumn('{{%image}}', 'downloaded_at');
    }
}
