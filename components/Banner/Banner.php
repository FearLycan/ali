<?php

namespace app\components\Banner;

use yii\base\Component;
use yii\db\Expression;
use yii\db\ActiveRecord;
use app\models\Banner as BannerModel;
use app\components\Visitors\IP;


class Banner extends Component
{
    /**
     * @param $country_code
     * @return array|ActiveRecord|null
     */
    public function getByCountryCode($country_code)
    {
        $banner = BannerModel::find()->joinWith('countries c');
        $banner->andWhere(['banner.status' => BannerModel::STATUS_ACTIVE]);

        if (!empty($country_code)) {
            $banner->andWhere(['or',
                ['c.code' => $country_code],
                ['c.code' => IP::GLOBAL_COUNTRY]
            ]);

        } else {
            $banner->andWhere(['c.code' => IP::GLOBAL_COUNTRY]);
        }

        $banner->orderBy(new Expression('rand()'));
        $banner->limit(1);

        return $banner->one();
    }
}