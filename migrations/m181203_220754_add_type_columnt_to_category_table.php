<?php

use app\models\Category;
use yii\db\Migration;

/**
 * Class m181203_220754_add_type_columnt_to_category_table
 */
class m181203_220754_add_type_columnt_to_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%category}}', 'type', $this->smallInteger()->defaultValue(0)->after('main_category'));

        $this->createIndex('{{%category_type_index}}', '{{%category}}', 'type');

        $this->insert('{{%category}}',
            [
                'id' => Category::SPORT_ITEM_ID,
                'name' => Category::SPORT_ITEM_NAME,
                'slug' => Category::SPORT_ITEM_SLUG,
                'parent_id' => Category::SPORT_ITEM_ID,
                'type' => Category::TYPE_SPORT
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%category}}', 'type');
    }
}
