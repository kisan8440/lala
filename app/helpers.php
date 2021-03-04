<?php

use App\Category;
use App\UserCart;
use App\BrandOEM;
use App\BrandCategory;
use App\SupportOEM;
use App\SupportCategory;
use Illuminate\Support\Facades\Auth;

//getting menu items 
function menuList()
{

    $cat = new Category();

    $menus = $cat->getCategory();

    return $menus;

}

function brandList()
{
	$boem = new BrandOEM();
	
	$brandmenus = $boem->getBrandOEM();
	
	return $brandmenus;
}

function supportList()
{
	$soem = new SupportOEM();
    
    $supportmenus = $soem->getSupportOEM();
	
 	return $supportmenus;
}



//Getting data from which domain we are accessing.
function getHost()
{
    $currentHost = '';
    $currentHost = request()->getHttpHost();
    $currentHost = strtolower($currentHost);
    // $currentHost = 'www.upswale.com';
    return $currentHost;
}

function userCart()
{
    return UserCart::where(['UserCSL' => Auth::user()->csl, 'carttype' => 'cart'])->count();
}

function userWishlist()
{
    return UserCart::where(['UserCSL' => Auth::user()->csl, 'carttype' => 'wishlist'])->count();
}


