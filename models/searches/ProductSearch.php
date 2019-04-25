<?php

namespace app\models\searches;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Product;
use yii\data\Sort;

/**
 * ProductSearch represents the model behind the search form of `app\models\Product`.
 */
class ProductSearch extends Product
{
    const SORT_PARAM = 'sort';

    public $sort;
    public $name;
    public $category;


    private $_sort;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'category'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function formName()
    {
        return '';
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
        $query = Product::find();
        $query->joinWith('category');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => $this->getSort(),
            'pagination' => [
                'pageSize' => 24,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        /*$query->andFilterWhere([
            'id' => $this->id,
        ]);*/

        $query->andFilterWhere(['like', 'product.name', $this->name]);
        $query->andFilterWhere(['=', 'category.slug', $this->category]);

        return $dataProvider;
    }

    /**
     * @return Sort
     */
    public function getSort()
    {
        if ($this->_sort === null) {
            $this->_sort = new Sort([
                'defaultOrder' => [
                    'created_at' => SORT_DESC,
                ],
                'attributes' => [
                    'rating' => [
                        'asc' => ['product.click' => SORT_ASC],
                        'desc' => ['product.click' => SORT_DESC],
                    ],
                    'created_at' => [
                        'asc' => ['product.created_at' => SORT_ASC],
                        'desc' => ['product.created_at' => SORT_DESC],
                    ],
                    'name' => [
                        'asc' => ['product.name' => SORT_ASC],
                        'desc' => ['product.name' => SORT_DESC],
                    ],
                ],
            ]);
        }

        $this->sort = Yii::$app->request->get(static::SORT_PARAM, '-created_at');

        return $this->_sort;
    }
}
