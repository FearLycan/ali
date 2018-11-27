<?php

namespace app\models;

use Yii;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%category}}".
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int $parent_id
 * @property int $main_category
 * @property string $created_at
 * @property string $updated_at
 */
class Category extends ActiveRecord
{
    const BASE_CATEGORY = 0;

    const FIRAT_ITEM_NAME = 'Women\'s Clothing & Accessories';
    const FIRAT_ITEM_SLUG = 'womens-clothing-and-accessories';
    const FIRAT_ITEM_ID = 1;

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
            'sluggable' => [
                'class' => SluggableBehavior::className(),
                'attribute' => 'name',
                'slugAttribute' => 'slug',
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
            [['parent_id', 'main_category'], 'integer'],
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

    /**
     * @param $categories
     * @return bool|int
     */
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

    /**
     * @return array
     */
    public function getFamilyPath()
    {
        $n = true;
        $parents = [];

        $parent_id = $this->parent_id;

        while ($n) {
            $category = self::find()->where(['id' => $parent_id])->one();

            if (!empty($category)) {
                $parents[] = [
                    'id' => $category->id,
                    'name' => $category->name,
                    'slug' => $category->slug,
                ];

                if ($category->parent_id == static::BASE_CATEGORY) {
                    $n = false;
                } else {
                    $parent_id = $category->parent_id;
                }

            } else {
                $n = false;
            }
        }

        return array_reverse($parents);
    }

    /**
     * @return bool|null|static
     */
    public function getParent()
    {
        if ($this->parent_id != self::BASE_CATEGORY) {
            return self::findOne($this->parent_id);
        }

        return false;
    }

    /**
     * @return $this|bool
     */
    public function getChildrens()
    {
        if ($this->parent_id != self::BASE_CATEGORY) {
            return self::find()->where(['parent_id' => $this->id])->all();
        }

        return false;
    }

    public static function getCategoryItems()
    {
        $categories = Category::find()
            ->where(['parent_id' => 1])
            ->orderBy(['name' => SORT_ASC])
            ->all();

        $categoryItem = [];
        /* @var $category \app\models\Category */
        foreach ($categories as $key => $category) {
            $categoryItem[$key] = [
                'label' => $category->name,
                'url' => \yii\helpers\Url::to(['image/index', 'category' => $category->slug])
            ];

            if ($childrens = $category->getChildrens()) {
                $childrenItem = [];
                foreach ($childrens as $c => $children) {
                    $childrenItem[$c] = [
                        'label' => $children->name,
                        'url' => \yii\helpers\Url::to(['image/index', 'category' => $children->slug])
                    ];

                    if ($cc = $children->getChildrens()) {
                        $a = [];
                        foreach ($cc as $n => $cu) {
                            $a[] = [
                                'label' => $cu->name,
                                'url' => \yii\helpers\Url::to(['image/index', 'category' => $cu->slug])
                            ];
                        }

                        $childrenItem[$c]['options'] = ['class' => 'dropdown'];
                        $childrenItem[$c]['linkOptions'] = ['class' => 'dropdown-toggle'];
                        $childrenItem[$c]['items'] = $a;
                    }
                }

                $categoryItem[$key]['options'] = ['class' => 'dropdown'];
                $categoryItem[$key]['linkOptions'] = ['class' => 'dropdown-toggle'];
                $categoryItem[$key]['items'] = $childrenItem;
            }
        }

        $first = [
            'label' => self::FIRAT_ITEM_NAME,
            'url' => \yii\helpers\Url::to(['/'])
        ];

        array_unshift($categoryItem, $first);

        return $categoryItem;
    }
}
