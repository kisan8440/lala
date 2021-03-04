<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{

    protected $table = 'WebSiteProduct_VIEW';
    
    public function getCategory()
    {
        $c_host = getHost();
        return DB::table('WEBSITEITEMCATEGORY_VIEW')
                        ->select('WEBSITEITEMCATEGORY_VIEW.CATEGORYCODE', 
                                'WEBSITEITEMCATEGORY_VIEW.categoryserialno', 
                                'WEBSITEITEMCATEGORY_VIEW.CATEGORYNAME',
                                'WEBSITEITEMCATEGORY_VIEW.domainserialno'
                                )
                        ->where('domainname', $c_host)
                        ->orderby('domainserialno', 'asc')
                        ->orderby('categoryserialno', 'asc')
                        ->get();
    }

    public function getSubCategory($cat = '')
    {
        $c_host = getHost();
        if($cat != ''){
            return DB::table('WEBSITEITEMSUBCATEGORY_VIEW')
                        ->where('domainname', $c_host)
                        ->whereIn('WEBSITEITEMSUBCATEGORY_VIEW.CATEGORYCODE', explode(',',$cat))
                        ->select('WEBSITEITEMSUBCATEGORY_VIEW.SUBCATEGORYCODE',
                                 'WEBSITEITEMSUBCATEGORY_VIEW.SUBCATEGORYNAME',
                                 'WEBSITEITEMSUBCATEGORY_VIEW.categoryserialno',
                                 'WEBSITEITEMSUBCATEGORY_VIEW.subcategoryserialno',
                                 'WEBSITEITEMSUBCATEGORY_VIEW.domainserialno'
                                 )
                        ->orderby('domainserialno', 'asc')
                        ->orderby('categoryserialno', 'asc')
                        ->orderby('subcategoryserialno', 'asc')
                        ->get();
        }else{
            return DB::table('WEBSITEITEMSUBCATEGORY_VIEW')
                        ->select('WEBSITEITEMSUBCATEGORY_VIEW.SUBCATEGORYCODE', 
                                'WEBSITEITEMSUBCATEGORY_VIEW.SUBCATEGORYNAME',
                                'WEBSITEITEMSUBCATEGORY_VIEW.categoryserialno',
                                'WEBSITEITEMSUBCATEGORY_VIEW.domainserialno',
                                'WEBSITEITEMSUBCATEGORY_VIEW.subcategoryserialno'
                                )
                        ->where('domainname', $c_host)
                        ->orderby('domainserialno', 'asc')
                        ->orderby('categoryserialno', 'asc')
                        ->orderby('subcategoryserialno', 'asc')
                        ->distinct('SUBCATEGORYCODE')
                        ->get();
        }
    }

    public function getOEM($cat = '', $subCat = '')
    {
        $c_host = getHost();
        $oem = DB::table('WebSiteItemOEM_VIEW')
                ->select('WebSiteItemOEM_VIEW.oemcode',
                     'WebSiteItemOEM_VIEW.oemname',
                     'WebSiteItemOEM_VIEW.categoryserialno',
                     'WebSiteItemOEM_VIEW.subcategoryserialno',
                     'WebSiteItemOEM_VIEW.oemserialno',
                     'WebSiteItemOEM_VIEW.domainserialno'                     
                     )
                ->when($c_host, function ($query, $c_host) {
                    return $query->where('WebSiteItemOEM_VIEW.domainname', $c_host);
                })
                ->when($cat, function ($query, $cat) {
                    return $query->whereIn('WebSiteItemOEM_VIEW.categorycode', explode(',', $cat));
                })
                ->when($subCat, function ($query, $subCat) {
                    return $query->whereIn('WebSiteItemOEM_VIEW.subcategorycode', explode(',', $subCat));
                })
                ->orderby('WebSiteItemOEM_VIEW.domainserialno', 'asc')
                ->orderby('WebSiteItemOEM_VIEW.categoryserialno', 'asc')
                ->orderby('WebSiteItemOEM_VIEW.subcategoryserialno', 'asc')
                ->orderby('WebSiteItemOEM_VIEW.oemserialno', 'asc')
                ->distinct('WebSiteItemOEM_VIEW.oemcode')
                ->get();

            return $oem->unique('WebSiteItemOEM_VIEW.oemcode');
        
    }

    public function getParamter($cat = '', $subCat = '')
    {
        $c_host = getHost();
        $oem = DB::table('WebSiteItemParameter_VIEW')
                ->select('WebSiteItemParameter_VIEW.ParameterCode',
                     'WebSiteItemParameter_VIEW.ParameterName',
                     'WebSiteItemParameter_VIEW.categoryserialno',
                     'WebSiteItemParameter_VIEW.subcategoryserialno',
                     'WebSiteItemParameter_VIEW.ParameterSerialNo',
                     'WebSiteItemParameter_VIEW.domainserialno'                     
                     )
                ->when($c_host, function ($query, $c_host) {
                    return $query->where('WebSiteItemParameter_VIEW.domainname', $c_host);
                })
                ->when($cat, function ($query, $cat) {
                    return $query->whereIn('WebSiteItemParameter_VIEW.categorycode', explode(',', $cat));
                })
                ->when($subCat, function ($query, $subCat) {
                    return $query->whereIn('WebSiteItemParameter_VIEW.subcategorycode', explode(',', $subCat));
                })
                ->orderby('WebSiteItemParameter_VIEW.domainserialno', 'asc')
                ->orderby('WebSiteItemParameter_VIEW.categoryserialno', 'asc')
                ->orderby('WebSiteItemParameter_VIEW.subcategoryserialno', 'asc')
                ->orderby('WebSiteItemParameter_VIEW.domainserialno', 'asc')
                ->distinct('WebSiteItemParameter_VIEW.ParameterCode')
                ->get();

            return $oem->unique('ParameterCode');
        
    }

    public function getOEMseries($cat = '', $subCat = '', $oem = '')
    {
        $c_host = getHost();
        $oem = DB::table('WebSiteItemOEMSeries_VIEW')
                ->select('WebSiteItemOEMSeries_VIEW.oemseriescode',
                     'WebSiteItemOEMSeries_VIEW.oemseriesname',
                     'WebSiteItemOEMSeries_VIEW.categoryserialno',
                     'WebSiteItemOEMSeries_VIEW.subcategoryserialno',
                     'WebSiteItemOEMSeries_VIEW.oemserialno',
                     'WebSiteItemOEMSeries_VIEW.oemseriesserialno',
                     'WebSiteItemOEMSeries_VIEW.domainserialno'
                     )
                ->when($c_host, function ($query, $c_host) {
                    return $query->where('domainname', $c_host);
                })
                ->when($cat, function ($query, $cat) {
                    return $query->whereIn('categorycode', explode(',', $cat));
                })
                ->when($subCat, function ($query, $subCat) {
                    return $query->whereIn('subcategorycode', explode(',', $subCat));
                })
                ->when($oem, function ($query, $oem) {
                    return $query->whereIn('oemcode', explode(',', $oem));
                })
                ->orderby('domainserialno', 'asc')
                ->orderby('categoryserialno', 'asc')
                ->orderby('subcategoryserialno', 'asc')
                ->orderby('oemserialno', 'asc')
                ->orderby('oemseriesserialno', 'asc')
                ->distinct('oemseriescode')
                ->get();
            
        $oem = $oem->unique('oemseriescode');

        return $oem;

    }

    public function getProduct($condition)
    {

        $category = $condition['categorycode'];

        $subCat = $condition['subcategorycode'];
        
        $price = $condition['price'];

        $oem = $condition['oemcode'];

        $price_sort = $condition['price_sort'];

        $name_sort = $condition['name_sort'];
        
        $newest_sort = $condition['newest_sort'];

        $oemseriescode = $condition['oemseriescode'];

        $domainName = getHost();

        return DB::table('WEBSITEPRODUCT_VIEW')
                ->select('WEBSITEPRODUCT_VIEW.*')
                ->when($domainName, function ($query, $domainName) {
                    return $query->where('domainname', $domainName);
                })
                ->when($category, function ($query, $category) {
                    return $query->whereIn('categorycode', explode(',', $category));
                })
                ->when($subCat, function ($query, $subCat) {
                    return $query->whereIn('subcategorycode', explode(',', $subCat));
                })
                ->when($oemseriescode, function ($query, $oemseriescode) {
                    return $query->whereIn('oemseriescode', explode(',', $oemseriescode));
                })
                ->when($oem, function ($query, $oem) {
                    return $query->whereIn('oemcode', explode(',', $oem));
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

    
    // Relationship 
    public function product_bom()
    {
        return $this->hasMany('App\ProductBOM', 'productcsl', 'csl')->orderby('serialno', 'asc');
    }

    public function product_description()
    {
        return $this->hasMany('App\ProductDescription', 'csl', 'csl')->orderby('serialno', 'asc');
    }
    
    

}
