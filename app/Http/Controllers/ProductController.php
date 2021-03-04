<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductDocumentDTL;
use App\ProductDocumentItemDTL;
use App\ProductDocumentItemNAV;
use App\ProductDocumentNAV;
use App\ProductItem;
use App\ProductItemSpecification;
use App\ProductNavDescription;
use App\ProductItemNavDescription;
use App\ProductItemOption;
use App\ProductItemService;
use App\ProductOption;
use App\ProductService;
use App\ProductSpecificationGroup;

use App\ProductItemParameter;



use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {

        return view('products.index');
    }

    public function categories($category = '')
    {
        if($category == ''){
            return view('products.index'); 
        }else{
            return view('products.products_categories')->with(compact('category'));
        }
    }
    

    public function show_products(Request $request)
    {

        $url = \Request::getRequestUri();

        $params = [
            'category' => '',
            'subCategory' => '',
            'price' => '',
            'oem' => '',
            'oemseries' => '',

            'price_sort' => '',
            'name_sort' => '',
            'newest_sort' => '',
        ];

        $parameters = [];
        
        //URL parameters add index as parameter in URL
        $conditions = [
            'categorycode' => '',
            'subcategorycode' => '',
            'price' => '',
            'oemcode' => '',
            'oemseriescode' => '',

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
        
        //Category implementation
        $cat = '';
        if(array_key_exists("category",$parameters)){
            $cat = $parameters['category'];
            $conditions['categorycode'] = $parameters['category'];
            $params['category'] = $parameters['category'];
        }

        //SubCategory implementation
        $subCat = '';
        if(array_key_exists("subCategory",$parameters)){
            $subCat = $parameters['subCategory'];
            $conditions['subcategorycode'] = $parameters['subCategory'];
            $params['subCategory'] = $parameters['subCategory'];
        }

        //oem implementation
        $oemcode = '';
        if(array_key_exists("oem",$parameters)){
            $oemcode = $parameters['oem'];
            $conditions['oemcode'] = $parameters['oem'];
            $params['oem'] = $parameters['oem'];
        }

        // $ProductParameter  = '';
        // if(array_key_exists("ProductParameter",$parameters)){
        //     $oemcode = $parameters['ProductParameter'];
        //     $conditions['oemcode'] = $parameters['oem'];
        //     $params['oem'] = $parameters['oem'];
        // }

        //oemseries implementation
        $oemseriescode = '';
        if(array_key_exists("oemseries",$parameters)){
            $oemseriescode = $parameters['oemseries'];
            $conditions['oemseriescode'] = $parameters['oemseries'];
            $params['oemseries'] = $parameters['oemseries'];
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
        $productModel = new Product();
    
        $category = $productModel->getCategory();

        $subCategory = $productModel->getSubCategory($cat);

        $productPrammer = $productModel->getParamter($cat, $subCat);
        
        $oem = $productModel->getOEM($cat, $subCat);

        $oemseries = $productModel->getOEMseries($cat, $subCat, $oemcode);
        
        $products = $productModel->getProduct($conditions);

        return view('products.products')
                ->with(compact('products'))
                ->with(compact('category'))
                ->with(compact('subCategory'))
                ->with(compact('productPrammer'))
                ->with(compact('params'))
                ->with(compact('oem'))
                ->with(compact('oemseries'))
                ;

    }

    //Product details
    public function view_one_product($id = '')
    {

        if($id != ''){

            $c_host = getHost();

            $productDetails = Product::with(['product_bom', 'product_description'])->where('csl', $id)->first();
            
            $productNavDesc = ProductNavDescription::where(['productcsl' => $id, 'domainname' => $c_host])->orderBy('domainserialno', 'ASC')->orderBy('descriptionserialno', 'ASC')->get();

            $productDocs['header'] = ProductDocumentNAV::where(['productcsl' => $id, 'domainname' => $c_host])->orderBy('domainserialno', 'ASC')->orderBy('serialno', 'ASC')->get();
            $productDocs['data'] = ProductDocumentDTL::where(['productcsl' => $id])->orderBy('serialno', 'ASC')->get();

            $productOptions = ProductOption::where('productcsl', $id)->orderBy('serialno', 'ASC')->get();

            $productServices = ProductService::where('productcsl', $id)->orderBy('serialno', 'ASC')->get();

            return view('products.product_details')->with(compact('productDetails'))
                                                   ->with(compact('productNavDesc'))
                                                   ->with(compact('productDocs'))
                                                   ->with(compact('productOptions'))
                                                   ->with(compact('productServices'));
            
        }else{

            return redirect(route('product.search'));
            
        }
    }

    // Products single item
    public function view_one_product_item($csl = '')
    {
        if($csl != ''){

            $c_host = getHost();
            
            $itemDetails = ProductItem::with(['productSpecification', 'itemImages', 'itemFeatures', 'itemFeatures.itemSubFeatures', 'itemFeatures.itemSubFeatures.itemFeaturesList'])->where('csl', $csl)->first();

            $specs = ProductSpecificationGroup::where(['itemcsl' => $csl, 'domainname' => $c_host])->orderBy('domainserialno', 'ASC')->orderBy('serialno', 'ASC')->get();
            
            $productNavDesc = ProductItemNavDescription::where(['itemcsl' => $csl, 'domainname' => $c_host])->orderBy('descriptionserialno')->distinct('discriptioncode')->get();

            $productDocs['header'] = ProductDocumentItemNAV::where(['itemcsl' => $csl, 'domainname' => $c_host])->orderBy('domainserialno', 'ASC')->orderBy('serialno', 'ASC')->get();
            $productDocs['data'] = ProductDocumentItemDTL::where(['itemcsl' => $csl])->orderBy('serialno', 'ASC')->get();

            $productOptions = ProductItemOption::where('itemcsl', $csl)->orderBy('serialno', 'ASC')->get();

            $productServices = ProductItemService::where('itemcsl', $csl)->orderBy('serialno', 'ASC')->get();

            return view('products.product_item_details')
                        ->with(compact('itemDetails'))
                        ->with(compact('specs'))
                        ->with(compact('productNavDesc'))
                        ->with(compact('productOptions'))
                        ->with(compact('productServices'))
                        ->with(compact('productDocs'));
                        
        }else{
            return redirect(route('product.search'));
        }
    }

    //Optional item for product
    public function view_one_product_optional_item($csl = '')
    {

        return '<div style="text-align: center; margin-top: 100px;"><h2>Working on it. :)</h2></div>';

        if($csl != ''){

            $c_host = getHost();

            $itemDetails = ProductOption::where('productcsl', $csl)->first();

            // dd($itemDetails);

            // $specs = ProductSpecificationGroup::where('csl', $csl)->get();

            // $productNavDesc = ProductItemNavDescription::where(['itemcsl' => $csl, 'domainname' => $c_host])->orderBy('descriptionserialno')->distinct('discriptioncode')->get();

            // $productDocs['header'] = ProductDocumentItemNAV::where(['itemcsl' => $csl, 'domainname' => $c_host])->orderBy('domainserialno', 'ASC')->orderBy('serialno', 'ASC')->get();
            // $productDocs['data'] = ProductDocumentItemDTL::where(['itemcsl' => $csl])->orderBy('serialno', 'ASC')->get();

            return view('products.product_optional_item_details')
                            ->with(compact('itemDetails'));
                            
        }else{
            return redirect(route('product.search'));
        }
        
    }
    
}
