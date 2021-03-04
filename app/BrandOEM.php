<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BrandOEM extends Model
{
	protected $table = 'WebSiteBrandOEM_VIEW';
	protected $timestamp = false;
	
	public function getBrandOEM()
	{
		$c_host = getHost();
		return BrandOEM::where('domainname', $c_host)->with('brandCategories')->with('brandSubCategories')->orderby('domainserialno', 'asc')->orderby('oemserialno', 'asc')->get();
	}
	
	public function brandCategories()
	{
		$c_host = getHost();
		return $this->hasMany('App\BrandCategory','oemcode','oemcode')->where('domainname', $c_host)->orderby('domainserialno', 'asc')->orderby('oemserialno', 'asc')->orderby('categoryserialno', 'asc');
	}
	
	public function brandSubCategories()
	{
		$c_host = getHost();
		return $this->hasMany('App\BrandSubCategory', 'oemcode','oemcode' ,'categorycode','categorycode')->where('domainname', $c_host)->orderby('domainserialno', 'asc')->orderby('oemserialno','asc')->orderby('categoryserialno', 'asc')->orderby('subcategoryserialno', 'asc');
	}
}