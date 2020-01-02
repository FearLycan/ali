<?php

namespace app\models\searches;

use app\models\Image;
use app\models\Member;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\data\Sort;

/**
 * ProductSearch represents the model behind the search form of `app\models\Product`.
 */
class MemberSearch extends Member
{
    const SORT_PARAM = 'sort';

    public $sort;

    private $_sort;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'country_code'], 'string'],
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
        $query = self::find()->where(['member.status' => self::STATUS_ACTIVE]);
        $query->joinWith(['images images']);
        $query->andWhere(['images.status' => Image::STATUS_ACCEPTED]);
        $query->groupBy(['member.id']);

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

        //  $query->andFilterWhere(['like', 'member.name', $this->name]);
        $query->andFilterWhere(['=', 'member.country_code', $this->country_code]);

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
                        'asc' => ['member.view' => SORT_ASC, 'member.id' => SORT_ASC],
                        'desc' => ['member.view' => SORT_DESC, 'member.id' => SORT_ASC],
                    ],
                    'created_at' => [
                        'asc' => ['member.created_at' => SORT_ASC, 'member.id' => SORT_ASC],
                        'desc' => ['member.created_at' => SORT_DESC, 'member.id' => SORT_ASC],
                    ],
                    'name' => [
                        'asc' => ['member.name' => SORT_ASC, 'member.id' => SORT_ASC],
                        'desc' => ['member.name' => SORT_DESC, 'member.id' => SORT_ASC],
                    ],
                ],
            ]);
        }

        $this->sort = Yii::$app->request->get(static::SORT_PARAM, '-created_at');

        return $this->_sort;
    }
}
