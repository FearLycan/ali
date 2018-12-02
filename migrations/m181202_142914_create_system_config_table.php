<?php

use app\models\SystemConfig;
use yii\db\Migration;

/**
 * Handles the creation of table `system_config`.
 */
class m181202_142914_create_system_config_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%system_config}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'value' => $this->text()->notNull(),
            'status' => $this->smallInteger()->defaultValue(0),
            'author_id' => $this->integer()->notNull(),
            'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->null()
        ]);

        $this->createIndex('{{%system_config_name_index}}', '{{%system_config}}', 'name');

        $this->createIndex('{{%system_config_created_at_index}}', '{{%system_config}}', 'created_at');
        $this->createIndex('{{%system_config_updated_at_index}}', '{{%system_config}}', 'updated_at');

        $this->addForeignKey('{{%system_config_author_id_fk}}', '{{%system_config}}', 'author_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');

        $this->insert('{{%system_config}}',
            [
                'name' => 'google-analytics',
                'value' => '<!-- config google-analytics -->',
                'status' => SystemConfig::STATUS_ACTIVE
            ],
            [
                'name' => 'google-adsense',
                'value' => '<!-- config google-adsense -->',
                'status' => SystemConfig::STATUS_ACTIVE
            ]
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%system_config}}');
    }
}
