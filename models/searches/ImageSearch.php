<?php

namespace app\models\searches;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Image;

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
        return [
            [['id', 'product_id', 'member_id', 'status'], 'integer'],
            [['url', 'created_at', 'updated_at'], 'safe'],
        ];
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
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Image::find()
            ->where(['status' => Image::STATUS_ACCEPTED]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSizeParam' => static::PER_PAGE_PARAM,
                'defaultPageSize' => static::DEFAULT_ITEMS_PER_PAGE,
                'pageSizeLimit' => [1, static::PAGE_SIZE_LIMIT],
                'validatePage' => false,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'product_id' => $this->product_id,
            'member_id' => $this->member_id,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'url', $this->url]);

        return $dataProvider;
    }

    /**
     * @return string[]
     */
    public static function getPageSizesArray()
    {
        return [
            static::DEFAULT_ITEMS_PER_PAGE => static::DEFAULT_ITEMS_PER_PAGE,
            50 => 50,
            static::PAGE_SIZE_LIMIT => static::PAGE_SIZE_LIMIT,
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
