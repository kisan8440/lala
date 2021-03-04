<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SupportPage extends Model
{

    protected $table = 'WebSiteSuppprtItem_VIEW';
    
    public function getSupportOEM()
    {
        $c_host = getHost();
        return DB::table('WebSiteSupportOEM_VIEW')
                        ->select('WebSiteSupportOEM_VIEW.OEMCODE', 
                                'WebSiteSupportOEM_VIEW.OEMNAME', 
                                'WebSiteSupportOEM_VIEW.oemserialno',
                                'WebSiteSupportOEM_VIEW.domainserialno'
                                )
                        ->where('domainname', $c_host)
                        ->orderby('domainserialno', 'asc')
                        ->orderby('oemserialno', 'asc')
                        ->get();
    }

    public function getSupportCategory($supportoem = '')
    {
        $c_host = getHost();
        $scat = DB::table('WebSiteSupportCategory_VIEW')
                ->select('WebSiteSupportCategory_VIEW.CATEGORYCODE',
                     'WebSiteSupportCategory_VIEW.CATEGORYNAME',
                     'WebSiteSupportCategory_VIEW.categoryserialno',
                     'WebSiteSupportCategory_VIEW.oemserialno',
                     'WebSiteSupportCategory_VIEW.domainserialno'                     
                     )
                ->when($c_host, function ($query, $c_host) {
                    return $query->where('WebSiteSupportCategory_VIEW.domainname', $c_host);
                })
                ->when($supportoem, function ($query, $supportoem) {
                    return $query->whereIn('WebSiteSupportCategory_VIEW.oemcode', explode(',', $supportoem));
                })
                ->orderby('WebSiteSupportCategory_VIEW.domainserialno', 'asc')
                ->orderby('WebSiteSupportCategory_VIEW.oemserialno', 'asc')
                ->orderby('WebSiteSupportCategory_VIEW.categoryserialno', 'asc')
                ->distinct('WebSiteSupportCategory_VIEW.CATEGORYCODE')
                ->get();

            return $scat->unique('WebSiteSupportCategory_VIEW.CATEGORYCODE');
    }

    public function getSupport($condition)
    {

        $supportoem = $condition['oemcode'];
		
		$supportcategory = $condition['categorycode'];

		$price = $condition['price'];

        $price_sort = $condition['price_sort'];

        $name_sort = $condition['name_sort'];
        
        $newest_sort = $condition['newest_sort'];

        $domainName = getHost();

        return DB::table('WebSiteSuppprtItem_VIEW')
                ->select('WebSiteSuppprtItem_VIEW.*')
                 ->when($domainName, function ($query, $domainName) {
                     return $query->where('domainname', $domainName);
                 })
                ->when($supportoem, function ($query, $supportoem) {
                     return $query->whereIn('oemcode', explode(',', $supportoem));
                 })
				 ->when($supportcategory, function ($query, $supportcategory) {
                     return $query->whereIn('categorycode', explode(',', $supportcategory));
                 })
                 ->when($price, function ($query, $price) {
                     return $query->whereBetween('price', explode(',', $price));
                 })
                 ->when($price_sort, function ($query, $price_sort) {
                     return $query->orderby('price', $price_sort);
                 })
                 ->when($name_sort, function ($query, $name_sort) {
                     return $query->orderby('printname', $name_sort);
                 })
                 ->when($newest_sort, function ($query, $newest_sort) {
                     return $query->orderby('csl', $newest_sort);
                 })
                ->paginate(20); 
    }
    
    

}
