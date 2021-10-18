<?php

namespace app\models\searches;

use app\models\Image;
use yii\data\ActiveDataProvider;

class TopImageSearch extends ImageSearch
{
    const TOP_WEEK = 'week';
    const TOP_24h = '24h';
    const TOP_48h = '48h';
    const TOP_MONTH = 'month';
    const TOP_ALL = 'all';

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @param $top
     * @return ActiveDataProvider
     */
    public function searchTop($params, $top)
    {
        $query = Image::find()
            ->where(['status' => Image::STATUS_ACCEPTED])
            ->andWhere(['<=', 'not_sexy', Image::MAX_NOT_SEXY_VALUE]);

        $date = $this->getTopDate($top);
        if ($date) {
            $query ->andWhere(['>=', 'downloaded_at', $date->format('Y-m-d H:i:s')]);
        }

        // add conditions that should always apply here
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['likes' => SORT_DESC, 'downloaded_at' => SORT_ASC]],
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

    public static function getTopsNames()
    {
        return [
            self::TOP_WEEK => 'top of the week',
            self::TOP_24h => 'top of the 24h',
            self::TOP_48h => 'top of the 48h',
            self::TOP_MONTH => 'top of the month',
            self::TOP_ALL => 'top of all',
        ];
    }

    public static function getTopValue($top)
    {
        $values = [
            self::TOP_WEEK => 168,
            self::TOP_24h => 24,
            self::TOP_48h => 48,
            self::TOP_MONTH => 720,
            self::TOP_ALL => 0,
        ];

        if (isset($values[$top])) {
            return $values[$top];
        }

        return $values['week'];
    }

    public function getTopDate($top)
    {
        $hours = self::getTopValue($top);

        if ($hours) {
            $date = (new \DateTime())->modify('-' . $hours . ' hours');
            $date->setTime(0, 0);

            return $date;
        }

        return false;
    }

}
