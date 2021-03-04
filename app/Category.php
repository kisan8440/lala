<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    protected $table = 'websiteitemcategory_view';
    protected $timestamp = false;

    public function getCategory()
    {
        $c_host = getHost();
        return Category::where('domainname', $c_host)->with('subCategories')->orderby('domainserialno', 'asc')->orderby('categoryserialno', 'asc')->get();
    }

    public function subCategories()
    {
        $c_host = getHost();
        return $this->hasMany('App\SubCategory', 'categorycode', 'categorycode')->where('domainname', $c_host)->orderby('domainserialno', 'asc')->orderby('categoryserialno', 'asc')->orderby('subcategoryserialno', 'asc');
    }


}
