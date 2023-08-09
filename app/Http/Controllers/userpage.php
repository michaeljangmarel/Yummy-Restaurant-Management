<?php

namespace App\Http\Controllers;

use App\Models\chef;
use App\Models\package;
use App\Models\product;
use App\Models\category;
use Illuminate\Http\Request;
use App\Http\Controllers\userpage;
use Illuminate\Routing\Controller;

class userpage extends Controller
{
    // go to about
    public function about(){
        return view('user.about');
    }

    // go to product and category
    public function product_cat(){
        $pro = product::when(request('key'),function($a){
            $search = request('key');
            $a->orWhere('name','like','%'.$search.'%');
        })->orderBy('id' , 'desc')->get();
        $cat = category::get();
         return view('user.productandcat' , compact('pro' , 'cat'));
    }

    // search process

    public function search($id){

         $pro = product::where('category_id' , $id)->orderBy('created_at' , 'desc')->get();
         $cat = category::get();
         return view('user.productandcat' , compact('pro' , 'cat'));

    }

    // chef and package
    public function package_chef(){
        $chef = package::get();
        $pack = chef::get();
        return view('user.package_chef.package_chef' , compact('chef' , 'pack'));
    }


    // add to cart ui
    public function cart_pages($id){
        $item = product::where('id' , $id)->first();
        $all = product::get();

        // dd($all->toArray());
        return view('user.cart.cart' , compact('item' , 'all'));
    }
}
