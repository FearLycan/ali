<?php

use yii\db\Migration;
use app\components\Visitors\IP;
use yii\helpers\Inflector;

/**
 * Class m200111_222508_add_global_country
 */
class m200111_222508_insert_global_country extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('{{%country}}', [
            'code' => IP::GLOBAL_COUNTRY,
            'name' => IP::GLOBAL_COUNTRY,
            'slug' => Inflector::slug(IP::GLOBAL_COUNTRY),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200111_222508_add_global_country cannot be reverted.\n";

        return false;
    }
}
