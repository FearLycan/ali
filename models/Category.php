<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%category}}".
 *
 * @property int $id
 * @property string $name
 * @property int $parent_id
 * @property string $created_at
 * @property string $updated_at
 */
class Category extends ActiveRecord
{
    const BASE_CATEGORY = 0;

    /**
     * @param bool $insert
     * @return array
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => date("Y-m-d H:i:s"),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%category}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'parent_id'], 'required'],
            [['parent_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'parent_id' => 'Parent ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public static function create($categories)
    {

        foreach ($categories as $key => $category) {

            if ($key == 0 && $category->textContent != 'Home') {
                return false;
            }

            if ($key == 1 && $category->textContent != 'All Categories') {
                return false;
            }

            if ($key == 2 && $category->textContent != 'Women\'s Clothing & Accessories') {
                return false;
            }

            if ($key > 2) {

                $cat = Category::find()->where(['name' => $category->textContent])->one();

                if (empty($cat)) {
                    $cat = new Category();
                    $cat->name = $category->textContent;

                    if ($key == 3) {
                        $parent_id = 1;
                    }

                    $cat->parent_id = $parent_id;
                    $cat->save();

                }

                $parent_id = $cat->id;
                unset($cat);

            }

        }

        return $parent_id;

    }
}
