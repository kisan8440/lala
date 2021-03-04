<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    
    
    protected $table = 'WEBSITEITEMSUBCATEGORY_VIEW';
    protected $timestamp = false;

    public function subCategories()
    {
        $this->hasMany('App\SubCategory', 'categorycode', 'categorycode');
    }

}
