<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class SupportCategory extends Model
{
		protected $table = 'WebSiteSupportCategory_VIEW';
		protected $timestamp = false;
		
	
	public function supportCategories()
		{
					$this->hasMany('App\SupportCategory', 'oemcode', 'oemcode');
		}



		
}