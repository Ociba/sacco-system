<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop;

class ShopController extends Controller
{
    //
    public function displayCartShop(){
        $display_item = Shop::where('status','active')->get();
        return view('front.shop',compact('display_item'));
       
    }
    public function displayCart(){
        $show_items_selected =Shop::where('status','active')
        ->get();
        return view('front.cart', compact('show_items_selected'));
    }
    public function displayCheckout(){
        return view('front.checkout');
    }
    public function createCart(Request $request){
        if(empty($request->product)){
            return Redirect()->back()->withInput()->withErrors("Product can not be empty");
        }
        if(empty($request->price)){
            return Redirect()->back()->withInput()->withErrors("Price can not be empty");
        }
        if(empty($request->quantity)){
            return Redirect()->back()->withInput()->withErrors("Quantity can not be empty");
        }
        if(empty($request->total)){
            return Redirect()->back()->withInput()->withErrors("Total can not be empty");
        }
        if($request->hasFile('item_image')) {

            $files = $request->file('item_image');
            $extension = $files->getClientOriginalExtension();
            $file_name = $files->getClientOriginalName();
            $folderpath =public_path().'/publicimages/profile_pictures/';
            $files->move($folderpath, $file_name);
        Shop::create(array(
            'product'=>$request->product,
            'price'=>$request->price,
            'quantity'=>$request->quantity,
            'total'=>$request->total,
            'image'=>$request->$file_name
        ));
        return Redirect()->back()->withError("You have add Item to the Cart Successfully");
}
else {
    return Redirect()->back()->withErrors("Error, seems like the file wasn't uploaded");
}
    
}
public function addShopItemsForm(){
    return view('front.add-items');
}
// public function displayProductInShop($id){
//   $display_item = Shop::where('id',$id)->get();
//   return view('front.shop',compact('display_item'));
// }
}