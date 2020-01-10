<?php

use yii\db\Migration;

/**
 * Class m200110_211636_add_country_code_to_visitors_table
 */
class m200110_211636_add_country_code_to_visitors_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%visitor}}', 'country_code', $this->string(10)->null()->after('country'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%visitor}}', 'country_code');
    }
}
