<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class BrandCategory extends Model
{
		protected $table = 'WebSiteBrandCategory_VIEW';
		protected $timestamp = false;
		
	
	public function brandCategories()
		{
					$this->hasMany('App\BrandCategory', 'oemcode', 'oemcode');
		}



		
}