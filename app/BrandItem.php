<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BrandItem extends Model
{
    
    protected $table = 'WebSiteBrandItem_VIEW';

    // relations

    public function brandSpecification()
    {
        return $this->hasMany('App\BrandItemSpecification', 'csl', 'csl')->orderBy('serialno');
    }


    public function groupbrandSpecification()
    {
        return $this->hasMany('App\BrandItemSpecification', 'csl', 'csl')->distinct('specificationgroupname');
    }

    public function itemImages()
    {
        $c_host = getHost();
        return $this->hasMany('App\BrandItemImage', 'itemcsl', 'csl')->where('domainname', $c_host)->orderBy('domainserialno', 'asc')->orderBy('serialno', 'asc');
    }

    public function itemFeatures()
    {
        $c_host = getHost();
        return $this->hasMany('App\BrandItemFeatureGroup', 'itemcsl', 'csl')->orderBy('serialno', 'asc');
    }


}
