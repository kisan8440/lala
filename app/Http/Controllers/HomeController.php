<?php

namespace App\Http\Controllers;

use App\BestDealProduct;
use App\BestDealBrand;
use App\BestDealSupport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    
    public function index(Request $request)
    {
        $c_host = getHost();
        $bestDealsProducts = BestDealProduct::where(['domainname' => $c_host])->orderBy('serialno', 'ASC')->take(20)->get();
        $bestDealsBrands = BestDealBrand::where(['domainname' => $c_host])->orderBy('serialno', 'ASC')->take(20)->get();
        $bestDealsSupport = BestDealSupport::where(['domainname' => $c_host])->orderBy('serialno', 'ASC')->take(20)->get();
        return view('index')->with(compact('bestDealsProducts'))
                            ->with(compact('bestDealsBrands'))
                            ->with(compact('bestDealsSupport'));
    }

    public function faq()
    {
        return view('faq');
    }

    public function company()
    {
        return view('company');
    }

    public function check_login()
    {
        if(Auth::check()){
            return '1';
        }else{
            return '0';
        }
    }

}
