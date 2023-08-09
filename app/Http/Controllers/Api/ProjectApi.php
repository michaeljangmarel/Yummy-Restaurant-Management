<?php

namespace App\Http\Controllers\Api;

use App\Models\chef;
use App\Models\User;
use App\Models\product;
use App\Models\category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ProjectApi;

class ProjectApi extends Controller
{
    //all product

    public function product(){

       $pro = product::get();
       return response()->json($pro, 200 );
    }

    // get one product

    public function product_one($no){
        $pros = product::where('id' , $no)->first();
        return response()->json($pros, 200 );
    }


    // all cat

    public function cate(){

        $cat = category::get();
        return response()->json($cat, 200);
    }


    // chef list

    public function chef (){
        $chefs = chef::get();
        return response()->json($chefs, 200);
    }

    // user info

    public function users (){
        $us = User::get();
        return response()->json($us, 200);
    }

    //delete one product

    public function prodele($id){
        $dele = product::where('id' , $id)->delete();
        $text = [
            'Process' => 'Success'
        ];


    return response()->json($text, 200   );
    }

    public function chefnames(Request $a){

        chef::where('id' , $a->id)->update([
            'name' => $a->name
        ]);

        return $text = [
            'status' => 'Updated'
        ];
    }
}
