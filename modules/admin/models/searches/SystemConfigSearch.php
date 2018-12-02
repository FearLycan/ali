<?php

namespace app\modules\admin\models\searches;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\SystemConfig;

/**
 * SystemConfigSearch represents the model behind the search form of `app\modules\admin\models\SystemConfig`.
 */
class SystemConfigSearch extends SystemConfig
{
    public $author;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [['name', 'value', 'created_at', 'updated_at', 'author'], 'safe'],
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
        $query = SystemConfig::find();
        $query->joinWith(['author author']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['author'] = [
            'asc' => ['author.name' => SORT_ASC],
            'desc' => ['author.name' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'system_config.name', $this->name])
            ->andFilterWhere(['like', 'system_config.value', $this->value])
            ->andFilterWhere(['like', 'author.name', $this->author])
            ->andFilterWhere(['=', 'system_config.status', $this->status]);

        return $dataProvider;
    }
}
