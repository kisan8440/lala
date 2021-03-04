<?php

namespace App\Http\Controllers;

use App\UserCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function cart()
    {
        $cartItem = UserCart::with(['prodDetails', 'itemDetails'])->where(['UserCSL' => Auth::user()->csl, 'carttype' => 'cart'])->orderBy('csl', 'desc')->paginate('5');
        return view('user.cart')->with(compact('cartItem'));
    }
    
    function add_to_cart(Request $request){

        //response var
        $resp['type'] = 'error';
        $resp['msg'] = 'Error.';

        $data = [];
        $data = $request->all();
        $data['UserCSL'] = Auth::user()->csl;
        $dup_Data = $data;
        //remove index for checking if already exists

        unset($dup_Data['TotalPrice']);
        unset($dup_Data['IsCustomized']);
        unset($dup_Data['CustomizedData']);

        //check if already exists
        $ifExists = UserCart::where($dup_Data)->exists();
        if(!$ifExists){
            $isAdded = UserCart::create($data);
            if($isAdded){
                $resp['type'] = 'success';
                $resp['msg'] = 'Item added successfully in your cart.';
            }else{
                $resp['type'] = 'error';
                $resp['msg'] = 'Unable to add this item in your cart. Try again';
            }
        }else{
            //If same
            $cart = UserCart::where($dup_Data)->first();

            if($cart->customizeddata == $request->input('CustomizedData')){
                $resp['type'] = 'success';
                $resp['msg'] = 'Item is already in your cart.';
            }
            else{
                $isUpdated = UserCart::where($dup_Data)->update($data);
                if($isUpdated){
                    $resp['type'] = 'success';
                    $resp['msg'] = 'Cart item updated successfully.';
                }else{
                    $resp['type'] = 'error';
                    $resp['msg'] = 'Unable to update cart';
                }
            }
            
        }

        return $resp;

    }

    public function remove($csl)
    {

        $ifExists = UserCart::where(['UserCSL' => Auth::user()->csl, 'carttype' => 'cart', 'csl' => $csl])->exists();

        if($ifExists){

            $isDel = UserCart::where(['UserCSL' => Auth::user()->csl, 'carttype' => 'cart', 'csl' => $csl])->delete();

            if($isDel){
                return redirect()->back()->with('success', 'Item successfully remove from cart.');
            }else{
                return redirect()->back()->with('error', 'Oops! Unable to remove item. Try again.');
            }

        }else{
            return redirect()->back()->with('error', 'Ohh! Targeted product not found in your cart.');
        }

    }
    
}
