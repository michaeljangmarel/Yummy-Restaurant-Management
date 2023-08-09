<?php

namespace App\Http\Controllers;

use App\Models\gallery;
use App\Models\contactinfo;
use App\Models\productcart;
use App\Models\productorder;
use Illuminate\Http\Request;
use App\Models\productorderlist;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ProductcartController;

class ProductcartController extends Controller
{
    //add to cart with ajax

    public function add_to_carts(Request $a){


        productcart::create([
            'user_id' => $a->usid ,
            'product_id' => $a->proid ,
            'count' => $a->count
        ]);

        $tex = [
            'process' => 'ok'
        ];
        return  response()->json($tex, 200);


    }

    // cart list

    public function cart_list_pages(){
        $total = 0 ;
        $i = productcart::select('productcarts.*' , 'products.name as proname' , 'products.price as proprice' ,'products.image as proimg' , 'products.id as proid')->join('products','productcarts.product_id','products.id')->orderBy('created_at' , 'desc')->get();

        foreach($i as $sub){
            $total += $sub->count * $sub->proprice ;
        }
         return view('user.cart.cartlist' , compact('i' ,'total'));
    }

    // cart one delete

    public function cart_delete_processs($id){
         productcart::where('id',$id)->delete();
         return redirect()->route('ui_cart_list');
    }

    // order product process

    public function productorderings(Request $arr){
        $fee = 0 ;
        foreach($arr->all() as $ar ){

       $finalorder = productorderlist::create([
            'user_id' => $ar['user_id'],
            'product_id' =>$ar['pro_id'],
            'qty' => $ar['qty'],
            'total' => $ar['total'],
            'order_code' =>$ar['order_code'],
        ]);

        $fee +=  $finalorder->total  ;

        }

        productcart::where('user_id' ,Auth::user()->id)->delete();

        productorder::create([
            'order_code' => $finalorder->order_code ,
            'final_total' => $fee + 2000 ,
            'user_id' => Auth::user()->id
        ]);

        $about = [
            'condition' => 'ok'
        ];

        return response()->json($about, 200);


          }


          // contact page

          public function contact_pages(){
            $b = gallery::get();
            return view('user.contact.contact',compact('b'));
          }


          // gallery page
          public function gallery_lists(){
            $g = gallery::get();
            return view('admin.gallery.gallerylist' , compact('g'));
          }

          // gallery create page
          public function gallery_pages(){
            return view('admin.gallery.creategallery');
          }

          // create process
          public function gallery_creates(Request $img){

            Validator::make($img->all() , ['photo' => 'required|mimes:png,jpg,jpeg|file'])->validate();

            $org = uniqid().$img->file('photo')->getClientOriginalName();
            $img->file('photo')->storeAs('public',$org);
            gallery::create([
                'image' => $org
            ]);

            return redirect()->route('ui_gallerylist');

          }

          // delete

          public function gallery_deletes($id){
            gallery::where('id' , $id)->delete();
            return redirect()->route('ui_gallerylist');
          }


          // order list
          public function order_pages(){
            $l = productorder::where('user_id' , Auth::user()->id)->orderBy('created_at' , 'desc')->get();
             return view('user.productorderlist.proorder' , compact('l'));
          }

          // create contact
          public function contact_creasing(Request $ai){


            $req = [
                'name' => 'required' ,
                'email' => 'required' ,
                'subject' => 'required' ,
                'message' => 'required' ,

            ];
            Validator::make($ai->all() , $req)->validate();

            contactinfo::create([
                'name' => $ai->name ,
                'email' => $ai->email,
                'subject' => $ai->subject ,
                'content' => $ai->message,
                'user_id' => Auth::user()->id
            ]);

            return redirect()->route('ui_contact')->with([
                'success' => 'Thanks for your support and infomation . Message was submitted .'
            ]);


           }
}
