<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductItemParameter extends Model
{
    protected $table = 'WebSiteItemParameter_VIEW';


    public function parametervalues()
    {
        return $this->hasMany('App\ProductItemParameterValue', 'parametercode', 'parametercode')->distinct('parametervalue')->orderby('serialno', 'asc');
    }
}
