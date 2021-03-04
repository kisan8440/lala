<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class BrandSubCategory extends Model
{
		protected $table = 'WebSiteBrandSubCategory_VIEW';
		protected $timestamp = false;
		
		public function brandSubCategories()
		{
					$this->hasMany('App\BrandSubCategory', 'oemcode', 'categorycode');
		}
}