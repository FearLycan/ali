<?php

namespace app\models\searches;

use app\models\Category;
use app\models\Image;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ImageSearch represents the model behind the search form of `app\models\Image`.
 */
class ImageSearch extends Image
{
    const PER_PAGE_PARAM = 'per-page';
    const DEFAULT_ITEMS_PER_PAGE = 20;
    const PAGE_SIZE_LIMIT = 100;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @param null $query
     * @param null $category
     * @param null $country
     * @return ActiveDataProvider
     */
    public function search($params, $query = null, $category = null, $country = null)
    {
        if ($query == null) {
            $query = Image::find()
                ->where(['image.status' => Image::STATUS_ACCEPTED])
                ->andWhere(['<=', 'not_sexy', Image::MAX_NOT_SEXY_VALUE]);
        }

        /* @var $category Category */
        if (!empty($category) && $category->slug == Category::FIRST_ITEM_SLUG) {
            $query->joinWith(['product.category pc']);
            $query->andFilterWhere(['in', 'pc.type', Category::TYPE_WOMEN_CLOTHING]);
        } elseif (!empty($category) && $category->slug == Category::SPORT_ITEM_SLUG) {
            $query->joinWith(['product.category pc']);
            $query->andFilterWhere(['in', 'pc.type', Category::TYPE_SPORT]);
        } elseif (!empty($category)) {
            $query->joinWith(['product product']);
            $query->andFilterWhere(['in', 'product.category_id', json_decode($category->main_category)]);
        } elseif ((!empty($country))) {
            $query->joinWith(['member m']);
            $query->andFilterWhere(['in', 'm.country_code', $country->code]);
        }

        // add conditions that should always apply here
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['downloaded_at' => SORT_DESC, 'id' => SORT_ASC]],
            'pagination' => [
                'pageSizeParam' => self::PER_PAGE_PARAM,
                'defaultPageSize' => self::DEFAULT_ITEMS_PER_PAGE,
                'pageSizeLimit' => [1, self::PAGE_SIZE_LIMIT],
                'validatePage' => false,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        return $dataProvider;
    }

    /**
     * @return string[]
     */
    public static function getPageSizesArray()
    {
        return [
            self::DEFAULT_ITEMS_PER_PAGE => self::DEFAULT_ITEMS_PER_PAGE,
            50 => 50,
            self::PAGE_SIZE_LIMIT => self::PAGE_SIZE_LIMIT,
        ];
    }

    /**
     * @return int
     */
    public function getPageSize()
    {
        $size = Yii::$app->request->get(static::PER_PAGE_PARAM, static::DEFAULT_ITEMS_PER_PAGE);
        if (!isset(static::getPageSizesArray()[$size])) {
            $size = static::DEFAULT_ITEMS_PER_PAGE;
        }

        return (int)$size;
    }
}
