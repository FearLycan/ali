<?php

use yii\db\Migration;

/**
 * Class m181119_102349_add_slug_columns
 */
class m181119_102349_add_slug_columns extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%member}}', 'slug', $this->string()->notNull()->after('name'));
        $this->addColumn('{{%category}}', 'slug', $this->string()->notNull()->after('name'));

        $this->createIndex('{{%slug_member_index}}', '{{%member}}', 'slug');
        $this->createIndex('{{%slug_category_index}}', '{{%category}}', 'slug');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('{{%slug_member_index}}', '{{%member}}');
        $this->dropIndex('{{%slug_category_index}}', '{{%category}}');

        $this->dropColumn('{{%member}}', 'slug');
        $this->dropColumn('{{%category}}', 'slug');
    }

}
