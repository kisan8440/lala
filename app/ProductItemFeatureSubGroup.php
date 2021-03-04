<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductItemFeatureSubGroup extends Model
{
    protected $table = 'WebSiteItemFeatureSBGroup_VIEW';

    public function itemFeaturesList()
    {
        return $this->hasMany('App\ProductItemFeature', 'itemcsl', 'itemcsl')
                    ->orderBy('featuregroupserialno', 'asc')
                    ->orderBy('featuresubgroupserialno', 'asc')
                    ->orderBy('featureserialno', 'asc');
    }

}
