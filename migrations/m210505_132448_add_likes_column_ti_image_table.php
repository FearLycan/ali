<?php

use yii\db\Migration;

/**
 * Class m210505_132448_add_likes_column_ti_image_table
 */
class m210505_132448_add_likes_column_ti_image_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%image}}', 'likes', $this->integer()->defaultValue(0)->after('fap_time'));

        $this->createIndex('{{%image_likes_index}}', '{{%image}}', 'likes');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%image}}', 'likes');
    }
}
