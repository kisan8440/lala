<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupportItem extends Model
{
    
    protected $table = 'WebSiteSuppprtItem_VIEW';

    // relations

    // public function brandSpecification()
    // {
    //     return $this->hasMany('App\BrandItemSpecification', 'csl', 'csl')->orderBy('serialno');
    // }


    // public function groupbrandSpecification()
    // {
    //     return $this->hasMany('App\BrandItemSpecification', 'csl', 'csl')->distinct('specificationgroupname');
    // }

    public function itemImages()
     {
         $c_host = getHost();
         return $this->hasMany('App\SupportItemImage', 'itemcsl', 'csl')->where('domainname', $c_host)->orderBy('domainserialno', 'asc')->orderBy('serialno', 'asc');
     }
    
    // Supported Item Relationship 
    public function Supprted_item()
    {
        return $this->hasMany('App\SupportedItem', 'itemcsl', 'csl')->orderby('itemdsl', 'asc');
    }

     // Description and scope of work
     public function Supprtitem_detail()
     {
         return $this->hasMany('App\SupportItemDetail', 'csl', 'csl')->orderby('csl', 'asc');
     }


}
