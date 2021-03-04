<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductItem extends Model
{
    
    protected $table = 'WebSiteItem_VIEW';

    // relations

    public function productSpecification()
    {
        return $this->hasMany('App\ProductItemSpecification', 'csl', 'csl')->orderBy('serialno');
    }


    public function groupProductSpecification()
    {
        return $this->hasMany('App\ProductItemSpecification', 'csl', 'csl')->distinct('specificationgroupname');
    }

    public function itemImages()
    {
        $c_host = getHost();
        return $this->hasMany('App\ProductItemImage', 'itemcsl', 'csl')->where('domainname', $c_host)->orderBy('domainserialno', 'asc')->orderBy('serialno', 'asc');
    }

    public function itemFeatures()
    {
        $c_host = getHost();
        return $this->hasMany('App\ProductItemFeatureGroup', 'itemcsl', 'csl')->orderBy('serialno', 'asc');
    }


}
