<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCart extends Model
{
    
    protected $table = 'WebSiteCart';
    
    protected $primaryKey = 'CSL';

    public $timestamps = false;
    
    protected $fillable = [
        'CSL',
        'UserCSL',
        'MenuModuleCode',
        'MenuModuleCSL',
        'TotalPrice',
        'IsCustomized',
        'CustomizedData',
        'Carttype',
        'InsertAuthor',
        'InsertTime',
        'UpdateAuthor',
        'UpdateTime'  
    ];



    //relations
    public function prodDetails()
    {
        return $this->hasOne('App\Product', 'csl', 'menumodulecsl');
    }

    public function itemDetails()
    {
        return $this->hasOne('App\ProductItem', 'csl', 'menumodulecsl');
    }

}
