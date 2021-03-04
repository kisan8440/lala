<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BrandItemFeatureGroup extends Model
{
    protected $table = 'WebSiteItemFeatureGroup_VIEW';

    public function itemSubFeatures()
    {
        return $this->hasMany('App\ProductItemFeatureSubGroup', 'itemcsl', 'itemcsl')
                    ->orderBy('featuregroupserialno', 'asc')
                    ->orderBy('featuresubgroupserialno', 'asc');
    }

}
