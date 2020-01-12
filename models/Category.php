<?php

namespace app\models;

use Yii;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\helpers\Url;

/**
 * This is the model class for table "{{%category}}".
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $code
 * @property int $parent_id
 * @property int $type
 * @property int $main_category
 * @property string $created_at
 * @property string $updated_at
 */
class Category extends ActiveRecord
{
    const BASE_CATEGORY = 0;
    const BASE_CATEGORY_SPORT = -1;
    const BASE_CATEGORY_UNDERWEAR = -3;
    const BASE_CATEGORY_JEWELRY = -4;

    const FIRST_ITEM_NAME = 'Women\'s Clothing';
    const FIRST_ITEM_SLUG = 'womens-clothing-and-accessories';
    const FIRST_ITEM_ID = 1;

    const TYPE_WOMEN_CLOTHING = 0;
    const TYPE_SPORT = 1;
    const TYPE_UNDERWEAR = 2;
    const TYPE_JEWELRY = 3;

    const SPORT_ITEM_NAME = 'Sports & Entertainment';
    const SPORT_ITEM_SLUG = 'sports-and-entertainment';
    const SPORT_ITEM_ID = 41;

    const UNDERWEAR_ITEM_NAME = 'Underwear & Sleepwears';
    const UNDERWEAR_ITEM_SLUG = 'underwear-and-sleepwears';
    const UNDERWEAR_ITEM_ID = 150;


    const JEWELRY_ITEM_NAME = 'Jewelry & Accessories';
    const JEWELRY_ITEM_SLUG = 'jewelry-and-accessories';
    const JEWELRY_ITEM_ID = 170;


    const NONE_CATEGORY_ID = 100;

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
            [['name', 'parent_id', 'type', 'code'], 'required'],
            [['parent_id', 'main_category', 'type'], 'integer'],
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
            'code' => 'Code',
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
        if (count($categories) == 1) {
            return self::NONE_CATEGORY_ID;
        }

        foreach ($categories as $key => $category) {

            if ($key == 0 && $category->textContent != 'Home') {
                return false;
            }

            if ($key == 1 && $category->textContent != 'All Categories') {
                return false;
            }

            if ($key == 2) {
                if ($category->textContent == self::FIRST_ITEM_NAME) {
                    $type = self::TYPE_WOMEN_CLOTHING;
                } elseif ($category->textContent == 'Sports & Entertainment') {
                    $type = self::TYPE_SPORT;
                } elseif ($category->textContent == self::UNDERWEAR_ITEM_NAME) {
                    $type = self::TYPE_UNDERWEAR;
                } elseif ($category->textContent == self::JEWELRY_ITEM_NAME) {
                    $type = self::TYPE_JEWELRY;
                } else {
                    return false;
                }
            }

            if ($key > 2) {
                $cat = Category::find()->where(['name' => $category->textContent])->one();

                if (empty($cat)) {
                    $cat = new Category();
                    $cat->name = $category->textContent;

                    if ($key == 3 && $type == self::TYPE_WOMEN_CLOTHING) {
                        $parent_id = self::FIRST_ITEM_ID;
                    } elseif ($key == 3 && $type == self::TYPE_SPORT) {
                        $parent_id = self::BASE_CATEGORY_SPORT;
                    } elseif ($key == 3 && $type == self::TYPE_UNDERWEAR) {
                        $parent_id = self::UNDERWEAR_ITEM_ID;
                    } elseif ($key == 3 && $type == self::TYPE_JEWELRY) {
                        $parent_id = self::JEWELRY_ITEM_ID;
                    }

                    $cat->parent_id = $parent_id;
                    $cat->type = $type;
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

                if ($category->parent_id == self::BASE_CATEGORY ||
                    $category->parent_id == self::BASE_CATEGORY_SPORT ||
                    $category->parent_id == self::BASE_CATEGORY_UNDERWEAR ||
                    $category->parent_id == self::BASE_CATEGORY_JEWELRY
                ) {
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
        return self::find()->where(['parent_id' => $this->id])->all();
    }

    public static function getCategoryItems($type)
    {
        $categories = Category::find()
            ->where(['parent_id' => self::getFirstParentID($type)])
            ->andWhere(['type' => $type])
            ->orderBy(['name' => SORT_ASC])
            ->all();

        $categoryItem = [];
        /* @var $category \app\models\Category */
        foreach ($categories as $key => $category) {
            $categoryItem[$key] = [
                'label' => $category->name,
                'url' => Url::to(['image/index', 'category' => $category->slug])
            ];

            if ($childrens = $category->getChildrens()) {
                $childrenItem = [];
                foreach ($childrens as $c => $children) {
                    $childrenItem[$c] = [
                        'label' => $children->name,
                        'url' => Url::to(['image/index', 'category' => $children->slug])
                    ];

                    if ($cc = $children->getChildrens()) {
                        $a = [];
                        foreach ($cc as $n => $cu) {
                            $a[] = [
                                'label' => $cu->name,
                                'url' => Url::to(['image/index', 'category' => $cu->slug])
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

        if ($type == self::TYPE_WOMEN_CLOTHING) {
            $first = [
                'label' => self::FIRST_ITEM_NAME,
                'url' => Url::to(['image/index', 'category' => self::FIRST_ITEM_SLUG])
            ];
        } elseif ($type == self::TYPE_SPORT) {
            $first = [
                'label' => self::SPORT_ITEM_NAME,
                'url' => Url::to(['image/index', 'category' => self::SPORT_ITEM_SLUG])
            ];
        }

        array_unshift($categoryItem, $first);

        return $categoryItem;
    }

    public static function getFirstParentID($type)
    {
        if ($type == self::TYPE_WOMEN_CLOTHING) {
            return self::FIRST_ITEM_ID;

        } elseif ($type == self::TYPE_SPORT) {
            return self::SPORT_ITEM_ID;
        }
    }
}
