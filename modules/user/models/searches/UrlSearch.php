<?php


namespace app\modules\user\models\searches;


use app\modules\admin\models\ProductUrl;
use Yii;
use app\modules\user\models\Url;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class UrlSearch extends Url
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['url', 'created_at', 'updated_at'], 'string'],
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
        $query = ProductUrl::find()
            ->joinWith('product product')
            ->where(['product_url.author_id' => Yii::$app->user->identity->id]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['created_at' => SORT_DESC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'status' => $this->status,
            //'type' => $this->type,
            'created_at' => $this->created_at,
            //'updated_at' => $this->updated_at,
            //'synchronized_at' => $this->synchronized_at,
        ]);

        /*$query->andFilterWhere(['like', 'name', $this->name])
            //->andFilterWhere(['like', 'url', $this->url])
            // ->andFilterWhere(['like', 'ali_owner_member_id', $this->ali_owner_member_id])
            //->andFilterWhere(['like', 'ali_product_id', $this->ali_product_id])
            ->andFilterWhere(['like', 'image', $this->image]);*/

        return $dataProvider;
    }
}