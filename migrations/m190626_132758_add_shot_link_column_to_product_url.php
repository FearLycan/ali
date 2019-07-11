<?php

use yii\db\Migration;

/**
 * Class m190626_132758_add_shot_link_column_to_product_url
 */
class m190626_132758_add_shot_link_column_to_product_url extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%product_url}}', 'short_url', $this->string()->null()->after('url'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%product_url}}', 'short_url');
    }
}
