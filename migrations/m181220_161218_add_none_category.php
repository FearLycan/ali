<?php

use app\models\Category;
use yii\db\Migration;

/**
 * Class m181220_161218_add_none_category
 */
class m181220_161218_add_none_category extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('{{%category}}',
            [
                'id' => Category::NONE_CATEGORY_ID,
                'name' => 'None Category',
                'slug' => 'none-category',
                'parent_id' => -2,
                'main_category' => '[' . Category::NONE_CATEGORY_ID . ']',
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181220_161218_add_none_category cannot be reverted.\n";

        return false;
    }

}
