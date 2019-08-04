<?php

use yii\db\Migration;

/**
 * Class m190730_194045_add_columns_to_product
 */
class m190730_194045_add_columns_to_product extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('{{%product}}', 'image', $this->text());

        $this->addColumn('{{%product}}', 'brand', $this->string()->null()->defaultValue('AliExpress')->after('click'));
        $this->addColumn('{{%product}}', 'review_count', $this->integer()->null()->after('brand'));
        $this->addColumn('{{%product}}', 'rating_value', $this->decimal(4,2)->null()->defaultValue(0)->after('review_count'));
        $this->addColumn('{{%product}}', 'price', $this->decimal(4,2)->null()->defaultValue(0)->after('rating_value'));
        $this->addColumn('{{%product}}', 'description', $this->text()->null()->after('price'));
        $this->addColumn('{{%product}}', 'stars', $this->text()->null()->defaultValue('[]')->after('description'));

        $this->createIndex('{{%product_brand_index}}', '{{%product}}', 'brand');
        $this->createIndex('{{%product_review_count_index}}', '{{%product}}', 'review_count');
        $this->createIndex('{{%product_review_value_index}}', '{{%product}}', 'rating_value');
        $this->createIndex('{{%product_price_index}}', '{{%product}}', 'price');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('{{%product_brand_index}}', '{{%product}}');
        $this->dropIndex('{{%product_review_count_index}}', '{{%product}}');
        $this->dropIndex('{{%product_review_value_index}}', '{{%product}}');

        $this->dropColumn('{{%product}}', 'brand');
        $this->dropColumn('{{%product}}', 'review_count');
        $this->dropColumn('{{%product}}', 'rating_value');
        $this->dropColumn('{{%product}}', 'price');
        $this->dropColumn('{{%product}}', 'description');
        $this->dropColumn('{{%product}}', 'stars');
    }

}
