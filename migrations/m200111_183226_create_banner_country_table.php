<?php

use yii\db\Migration;

/**
 * Handles the creation of table `banner_country`.
 */
class m200111_183226_create_banner_country_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%banner_country}}', [
            'banner_id' => $this->integer()->notNull(),
            'country_id' => $this->integer()->notNull(),
        ]);

        $this->addPrimaryKey('{{%banner_country_pk}}', '{{%banner_country}}', ['banner_id', 'country_id']);
        $this->addForeignKey('{{%banner_id_fk}}', '{{%banner_country}}', 'banner_id', '{{%banner}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('{{%country_id_fk}}', '{{%banner_country}}', 'country_id', '{{%country}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('{{%banner_id_fk}}', '{{%banner_country}}');
        $this->dropForeignKey('{{%country_code_fk}}', '{{%banner_country}}');
        $this->dropTable('{{%banner_country}}');
    }
}
