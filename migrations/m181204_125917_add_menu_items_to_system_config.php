<?php

use yii\db\Migration;

/**
 * Class m181204_125917_add_menu_items_to_system_config
 */
class m181204_125917_add_menu_items_to_system_config extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('{{%system_config}}',
            [
                'name' => 'menu-clothing',
                'value' => '[]',
                //'author_id' => 1,
            ]);

        $this->insert('{{%system_config}}',
            [
                'name' => 'menu-sport',
                'value' => '[]',
                //'author_id' => 1,
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

    }

}
