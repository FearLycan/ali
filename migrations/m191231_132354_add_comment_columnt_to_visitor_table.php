<?php

use yii\db\Migration;

/**
 * Class m191231_132354_add_comment_columnt_to_visitor_table
 */
class m191231_132354_add_comment_columnt_to_visitor_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%visitor}}', 'comment', $this->string()->null()->after('count'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%visitor}}', 'comment');
    }
}
