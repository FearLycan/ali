<?php

use yii\db\Migration;

/**
 * Class m181130_142112_add_click_column
 */
class m181130_142112_add_click_column extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%member}}', 'click', $this->integer()->defaultValue(0)->after('type'));
        $this->addColumn('{{%product}}', 'click', $this->integer()->defaultValue(0)->after('type'));

        $this->addColumn('{{%member}}', 'view', $this->integer()->defaultValue(0)->after('type'));
        $this->addColumn('{{%product}}', 'view', $this->integer()->defaultValue(0)->after('type'));

        $this->createIndex('{{%member_click_index}}', '{{%member}}', 'click');
        $this->createIndex('{{%product_click_index}}', '{{%product}}', 'click');

        $this->createIndex('{{%member_view_index}}', '{{%member}}', 'view');
        $this->createIndex('{{%product_view_index}}', '{{%product}}', 'view');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('{{%member_click_index}}', '{{%member}}');
        $this->dropIndex('{{%product_click_index}}', '{{%product}}');

        $this->dropIndex('{{%member_view_index}}', '{{%member}}');
        $this->dropIndex('{{%product_view_index}}', '{{%product}}');
    }
}
