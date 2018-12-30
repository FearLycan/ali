<?php

use app\models\Category;
use yii\db\Migration;

/**
 * Class m181230_180718_add_underwear_category
 */
class m181230_180718_add_underwear_category extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('{{%category}}',
            [
                'id' => Category::UNDERWEAR_ITEM_ID,
                'name' => Category::UNDERWEAR_ITEM_NAME,
                'slug' => Category::UNDERWEAR_ITEM_SLUG,
                'parent_id' => -3,
                'main_category' => '[' . Category::UNDERWEAR_ITEM_ID . ']',
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181230_180718_add_underwear_category cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181230_180718_add_underwear_category cannot be reverted.\n";

        return false;
    }
    */
}
