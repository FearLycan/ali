<?php

namespace app\modules\admin\models\forms;

use app\models\BannerCountry;
use app\modules\admin\models\Banner;

class BannerForm extends Banner
{
    public $countryIDs;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'url', 'image', 'countryIDs'], 'required'],
            [['url'], 'url'],
            [['status'], 'integer'],
            [['status'], 'in', 'range' => array_keys(self::getStatusNames())],
            [['name', 'slug', 'description', 'url', 'image'], 'string', 'max' => 255],
            ['countryIDs', 'each', 'rule' => ['integer']],
        ];
    }

    public function setCountryIDs()
    {
        BannerCountry::deleteAll(['banner_id' => $this->id]);

        foreach ($this->countryIDs as $countryID) {
            $connect = new BannerCountry();
            $connect->banner_id = $this->id;
            $connect->country_id = $countryID;
            $connect->save();
        }
    }

    public function getCountryIDs()
    {
        $IDs = [];

        foreach ($this->countries as $country) {
            $IDs[] = $country->id;
        }

        return $IDs;
    }
}