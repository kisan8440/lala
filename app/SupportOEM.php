<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SupportOEM extends Model
{
	protected $table = 'WebSiteSupportOEM_VIEW';
	protected $timestamp = false;
	
	public function getSupportOEM()
	{
		$c_host = getHost();
		return SupportOEM::where('domainname', $c_host)->with('supportCategories')->orderby('domainserialno', 'asc')->orderby('oemserialno', 'asc')->get();
	}
	
	public function supportCategories()
	{
		$c_host = getHost();
		return $this->hasMany('App\SupportCategory','oemcode','oemcode')->where('domainname', $c_host)->orderby('domainserialno', 'asc')->orderby('oemserialno', 'asc')->orderby('Categoryserialno', 'asc');
	}
}