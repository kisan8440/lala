<?php

namespace App\Http\Controllers;

use App\Brand;
use App\BrandItem;
use App\BrandSpecificationGroup;
use App\BrandItemNavDescription;
use App\BrandDocumentItemNAV;
use App\BrandDocumentItemDTL;
use App\BrandItemOption;
use App\BrandItemService;

use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function show_products(Request $request)
    {

        $url = \Request::getRequestUri();

        $params = [
            'brandoem' => '',
            'brandcategory' => '',
            'brandsubcategory' => '',
            'price' => '',
            'price_sort' => '',
            'name_sort' => '',
            'newest_sort' => '',
        ];

        $parameters = [];
        
        //URL parameters add index as parameter in URL
        $conditions = [
            'oemcode' => '',
            'categorycode' => '',
            'subcategorycode' => '',
            'price' => '',
            'price_sort' => '',
            'name_sort' => '',
            'newest_sort' => '',
        ];

        $parts = parse_url($url);
        if(array_key_exists("query", $parts)){
            parse_str($parts['query'], $query);
            $parameters = $query;
        }            

        //Conditions implementation
        
		//oem implementation
        $boem = '';
        if(array_key_exists("brandoem",$parameters)){
            $oemcode = $parameters['brandoem'];
            $conditions['oemcode'] = $parameters['brandoem'];
            $params['brandoem'] = $parameters['brandoem'];
        }

        //Category implementation
        $bcat = '';
        if(array_key_exists("brandcategory",$parameters)){
            $cat = $parameters['brandcategory'];
            $conditions['categorycode'] = $parameters['brandcategory'];
            $params['brandcategory'] = $parameters['brandcategory'];
        }

        //SubCategory implementation
        $bscat = '';
        if(array_key_exists("brandsubcategory",$parameters)){
            $subCat = $parameters['brandsubcategory'];
            $conditions['subcategorycode'] = $parameters['brandsubcategory'];
            $params['brandsubcategory'] = $parameters['brandsubcategory'];
        }

        //Price implementation
        if(array_key_exists("price",$parameters)){
            $conditions['price'] = $parameters['price'];
            $params['price'] = $parameters['price'];
        }

        //sortings
        //price sorting
        $pricesorting = '';
        if(array_key_exists("price_sort",$parameters)){
            $pricesorting = $parameters['price_sort'];
            $conditions['price_sort'] = $parameters['price_sort'];
            $params['price_sort'] = $parameters['price_sort'];
        }
        
        //name sorting
        $namesorting = '';
        if(array_key_exists("name_sort",$parameters)){
            $namesorting = $parameters['name_sort'];
            $conditions['name_sort'] = $parameters['name_sort'];
            $params['name_sort'] = $parameters['name_sort'];
        }
        
        //newest sorting
        $newestsorting = '';
        if(array_key_exists("newest_sort",$parameters)){
            $newestsorting = $parameters['newest_sort'];
            $conditions['newest_sort'] = $parameters['newest_sort'];
            $params['newest_sort'] = $parameters['newest_sort'];
        }

        //Getting value from database
        $brandModel = new Brand();
    
        $brandoem = $brandModel->getBrandOEM();

        $brandcategory = $brandModel->getBrandCategory($boem);

        $brandsubcategory = $brandModel->getBrandSubCategory($boem, $bcat);
        
        $brands = $brandModel->getBrand($conditions);

        return view('brands.brands')
                ->with(compact('brands'))
                ->with(compact('params'))
                ->with(compact('brandoem'))
                ->with(compact('brandcategory'))
                ->with(compact('brandsubcategory'))
                ;

    }
	
	// Brands single item
    public function view_one_brand_item($csl = '')
    {
        if($csl != ''){

            $c_host = getHost();
            
            $itemDetails = BrandItem::with(['brandSpecification', 'itemImages', 'itemFeatures', 'itemFeatures.itemSubFeatures', 'itemFeatures.itemSubFeatures.itemFeaturesList'])->where('csl', $csl)->first();

            $specs = BrandSpecificationGroup::where(['itemcsl' => $csl, 'domainname' => $c_host])->orderBy('domainserialno', 'ASC')->orderBy('serialno', 'ASC')->get();
            
            $brandNavDesc = BrandItemNavDescription::where(['itemcsl' => $csl, 'domainname' => $c_host])->orderBy('descriptionserialno')->distinct('discriptioncode')->get();

            $brandDocs['header'] = BrandDocumentItemNAV::where(['itemcsl' => $csl, 'domainname' => $c_host])->orderBy('domainserialno', 'ASC')->orderBy('serialno', 'ASC')->get();
            $brandDocs['data']   = BrandDocumentItemDTL::where(['itemcsl' => $csl])->orderBy('serialno', 'ASC')->get();

            $brandOptions = BrandItemOption::where('itemcsl', $csl)->orderBy('serialno', 'ASC')->get();

            $brandServices = BrandItemService::where('itemcsl', $csl)->orderBy('serialno', 'ASC')->get();

            return view('brands.brand_item_details')
                        ->with(compact('itemDetails'))
                        ->with(compact('specs'))
                        ->with(compact('brandNavDesc'))
                        ->with(compact('brandOptions'))
                        ->with(compact('brandServices'))
                        ->with(compact('brandDocs'));
                        
        }else{
            return redirect(route('brands.search'));
        }
    }
}
