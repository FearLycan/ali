<?php

use app\models\Category;
use yii\db\Migration;

/**
 * Class m190429_094428_add_jewelry_category
 */
class m190429_094428_add_jewelry_category extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('{{%category}}',
            [
                'id' => Category::JEWELRY_ITEM_ID,
                'name' => Category::JEWELRY_ITEM_NAME,
                'slug' => Category::JEWELRY_ITEM_SLUG,
                'parent_id' => Category::BASE_CATEGORY_JEWELRY,
                'main_category' => '[' . Category::JEWELRY_ITEM_ID . ']',
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190429_094428_add_jewelry_category cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190429_094428_add_jewelry_category cannot be reverted.\n";

        return false;
    }
    */
}
