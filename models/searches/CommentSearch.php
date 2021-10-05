<?php

namespace app\models\searches;

use app\models\Comment;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\data\Sort;
use Yii;
use yii\web\Cookie;

/**
 *
 * @property-read string $defaultSort
 */
class CommentSearch extends Comment
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
            [['sort'], 'string', 'max' => 30],
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
     * @param $image_id
     * @return ActiveDataProvider
     */
    public function search($params, $image_id)
    {
        $query = Comment::find()->andWhere([
            'image_id' => $image_id,
            'status' => Comment::STATUS_ACTIVE
        ]);

        // add conditions that should always apply here
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => $this->getSort(),
            'pagination' => [
                'pageSize' => 300,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }


        //$query->andFilterWhere(['like', 'name', $this->name]);
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
                    'created_at' => [
                        'asc' => ['comment.created_at' => SORT_ASC, 'comment.id' => SORT_ASC],
                        'desc' => ['comment.created_at' => SORT_DESC, 'comment.id' => SORT_ASC],
                    ],
                    'best' => [
                        'asc' => ['comment.up_vote' => SORT_DESC, 'comment.id' => SORT_ASC],
                        'desc' => ['comment.down_vote' => SORT_DESC, 'comment.id' => SORT_ASC],
                    ],
                ],
            ]);
        }

        $this->sort = $this->getDefaultSort();

        return $this->_sort;
    }

    private function getDefaultSort()
    {
        $cookies = Yii::$app->request->cookies;
        $sort_param = Yii::$app->request->get('sort', null);
        $sort = '-created_at';

        //no cookie, no filtering -> set default cookie
        if (($cookie = $cookies->get('sort')) === null && $sort_param == null) {
            $cookie = new Cookie([
                'name' => 'sort',
                'value' => $sort,
                'expire' => time() + 86400 * 31 * 12,
            ]);

            Yii::$app->response->cookies->add($cookie);
        }

        //have cookie, no filtering -> get cookie
        if (($cookie = $cookies->get('sort')) !== null && $sort_param == null) {
            $sort = $cookie->value;
        }

        //have cookie, have filtering -> create new cookie
        if (($cookie = $cookies->get('sort')) !== null && $sort_param != null) {
            $cookie = new Cookie([
                'name' => 'sort',
                'value' => $sort_param,
                'expire' => time() + 86400 * 31 * 12,
            ]);

            Yii::$app->response->cookies->add($cookie);
            $sort = $sort_param;
        }

        return $sort;
    }
}