<?php

namespace App\Http\Controllers;

use App\SupportPage;
use App\SupportItem;
use App\Supprteditem;
use App\SupportItemNavDescription;

use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function show_products(Request $request)
    {

        $url = \Request::getRequestUri();

        $params = [
            'supportoem' => '',
            'supportcategory' => '',
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
        $soem = '';
        if(array_key_exists("supportoem",$parameters)){
            $oemcode = $parameters['supportoem'];
            $conditions['oemcode'] = $parameters['supportoem'];
            $params['supportoem'] = $parameters['supportoem'];
        }

        //Category implementation
        $scat = '';
        if(array_key_exists("supportcategory",$parameters)){
            $cat = $parameters['supportcategory'];
            $conditions['categorycode'] = $parameters['supportcategory'];
            $params['supportcategory'] = $parameters['supportcategory'];
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
        $supportModel = new SupportPage();
    
        $supportoem = $supportModel->getSupportOEM();

        $supportcategory = $supportModel->getSupportCategory($soem);

        $support = $supportModel->getSupport($conditions);

        return view('support.support')
                ->with(compact('support'))
                ->with(compact('params'))
                ->with(compact('supportoem'))
                ->with(compact('supportcategory'))
                ;

    }

    // Support single item
    public function view_one_support_item($csl = '')
    {
        if($csl != ''){

            $c_host = getHost();
            
            $itemDetails = SupportItem::with(['Supprted_item','itemImages','Supprtitem_detail'])->where('csl', $csl)->first();
            $supportNavDesc = SupportItemNavDescription::where(['itemcsl' => $csl, 'domainname' => $c_host])->orderBy('descriptionserialno')->distinct('discriptioncode')->get();

            return view('support.support_item_details')
                        ->with(compact('itemDetails'))
                        ->with(compact('supportNavDesc'))
                        ;
        }
        else{
            return redirect(route('support.search'));
        }
    }
}
