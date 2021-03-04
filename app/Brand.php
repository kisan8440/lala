<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Brand extends Model
{

    protected $table = 'WebSiteBrandItem_VIEW';
    
    public function getBrandOEM()
    {
        $c_host = getHost();
        return DB::table('WebSiteBrandOEM_VIEW')
                        ->select('WebSiteBrandOEM_VIEW.OEMCODE', 
                                'WebSiteBrandOEM_VIEW.OEMNAME', 
                                'WebSiteBrandOEM_VIEW.oemserialno',
                                'WebSiteBrandOEM_VIEW.domainserialno'
                                )
                        ->where('domainname', $c_host)
                        ->orderby('domainserialno', 'asc')
                        ->orderby('oemserialno', 'asc')
                        ->get();
    }

    public function getBrandCategory($boem = '')
    {
        $c_host = getHost();
        $bcat = DB::table('WebSiteBrandCategory_VIEW')
                ->select('WebSiteBrandCategory_VIEW.CATEGORYCODE',
                     'WebSiteBrandCategory_VIEW.CATEGORYNAME',
                     'WebSiteBrandCategory_VIEW.categoryserialno',
                     'WebSiteBrandCategory_VIEW.oemserialno',
                     'WebSiteBrandCategory_VIEW.domainserialno'                     
                     )
                ->when($c_host, function ($query, $c_host) {
                    return $query->where('WebSiteBrandCategory_VIEW.domainname', $c_host);
                })
                ->when($boem, function ($query, $boem) {
                    return $query->whereIn('WebSiteBrandCategory_VIEW.oemcode', explode(',', $boem));
                })
                ->orderby('WebSiteBrandCategory_VIEW.domainserialno', 'asc')
                ->orderby('WebSiteBrandCategory_VIEW.oemserialno', 'asc')
                ->orderby('WebSiteBrandCategory_VIEW.categoryserialno', 'asc')
                ->distinct('WebSiteBrandSubCategory_VIEW.CATEGORYCODE')
                ->get();

            return $bcat->unique('WebSiteBrandCategory_VIEW.CATEGORYCODE');
    }

    public function getBrandSubCategory($boem = '', $bcat = '')
    {
        $c_host = getHost();
        $bscat = DB::table('WebSiteBrandSubCategory_VIEW')
                ->select('WebSiteBrandSubCategory_VIEW.SUBCATEGORYCODE',
                     'WebSiteBrandSubCategory_VIEW.SUBCATEGORYNAME',
                     'WebSiteBrandSubCategory_VIEW.subcategoryserialno',
                     'WebSiteBrandSubCategory_VIEW.categoryserialno',
                     'WebSiteBrandSubCategory_VIEW.oemserialno',
                     'WebSiteBrandSubCategory_VIEW.domainserialno'                     
                     )
                ->when($c_host, function ($query, $c_host) {
                    return $query->where('WebSiteBrandSubCategory_VIEW.domainname', $c_host);
                })
                ->when($boem, function ($query, $boem) {
                    return $query->whereIn('WebSiteBrandSubCategory_VIEW.oemcode', explode(',', $boem));
                })
				->when($bcat, function ($query, $bcat) {
                    return $query->whereIn('WebSiteBrandSubCategory_VIEW.categorycode', explode(',', $bcat));
                })
                ->orderby('WebSiteBrandSubCategory_VIEW.domainserialno', 'asc')
                ->orderby('WebSiteBrandSubCategory_VIEW.oemserialno', 'asc')
                ->orderby('WebSiteBrandSubCategory_VIEW.categoryserialno', 'asc')
                ->orderby('WebSiteBrandSubCategory_VIEW.subcategoryserialno', 'asc')
                ->distinct('WebSiteBrandSubCategory_VIEW.SUBCATEGORYCODE')
                ->get();

            return $bscat->unique('WebSiteBrandSubCategory_VIEW.SUBCATEGORYCODE');
        
    }

    

    public function getBrand($condition)
    {

        $brandoem = $condition['oemcode'];
		
		$brandcategory = $condition['categorycode'];

		$brandsubcategory = $condition['subcategorycode'];
        
        $price = $condition['price'];

        $price_sort = $condition['price_sort'];

        $name_sort = $condition['name_sort'];
        
        $newest_sort = $condition['newest_sort'];

        $domainName = getHost();

        return DB::table('WebSiteBrandItem_VIEW')
                ->select('WebSiteBrandItem_VIEW.*')
                ->when($domainName, function ($query, $domainName) {
                    return $query->where('domainname', $domainName);
                })
                ->when($brandoem, function ($query, $brandoem) {
                    return $query->whereIn('oemcode', explode(',', $brandoem));
                })
				->when($brandcategory, function ($query, $brandcategory) {
                    return $query->whereIn('categorycode', explode(',', $brandcategory));
                })
                ->when($brandsubcategory, function ($query, $brandsubcategory) {
                    return $query->whereIn('subcategorycode', explode(',', $brandsubcategory));
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
