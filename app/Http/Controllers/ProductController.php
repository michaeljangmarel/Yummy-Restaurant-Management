<?php

namespace App\Http\Controllers;
use Storage ;
use App\Models\User;
use App\Models\product;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
 use App\Http\Controllers\ProductController;

class ProductController extends Controller
{


    // list product
 public function create_product(){
    $pro = product::select('products.*' , 'categories.name as catname')->join('categories' , 'products.category_id' , 'categories.id' )->orderBy('created_at' , 'desc')->get();

    return view('admin.product.createproduct' , compact('pro'));
 }

// ui form create product

public function form_cre(){
    $cat = category::get();
     return view('admin.product.form' , compact('cat'));
}


// create process

public function create_pro( Request $a ){


    $req = [
        'name' => 'required|unique:products,name|min:4',
        'price' => 'required' ,
        'time' => 'required' ,
        'pizimg' => 'required|mimes:png,jpg,jpeg,jfif|file' ,
        'text' => 'required|min:4' ,
        'category' => 'required' ,
    ];
     Validator::make($a->all() , $req)->validate();
     $ab = $this->moti($a);


    if($a->hasFile('pizimg')){
        $orgs = uniqid().'piz'.$a->file('pizimg')->getClientOriginalName();
        $a->file('pizimg')->storeAs('public' , $orgs);
        $ab['image'] = $orgs ;
    }


    product::create($ab);
    return redirect()->route('product_ui');

 }


 // delete product process

 public function delete_item($id){

    product::where('id' , $id)->delete();

    return redirect()->route('product_ui');


 }







 // change password ui

 public function change_ui(){
    return view('admin.password.change');
 }


 // change process

 public function change_pass(Request $pass){

    $req = [
         'old' => 'required' ,
         'new' => 'required' ,
         'con' => 'required|same:new'
    ];
    Validator::make($pass->all() , $req)->validate();

     $old = User::where('id' , Auth::user()->id)->first();
     $oldpassword = $old->password ;

     if(Hash::check($pass->old, $oldpassword)){

        User::where('id' , Auth::user()->id)->update([
            'password' => Hash::make($pass->new)
        ]);

        return redirect()->route('ui_admin');



     }

 }

 // user ui

public function user_list(){
    $user = User::where('role' , 'user')->get();
     return view('admin.user.userlist' , compact('user'));
}


// ajax with user to admin process

 public function user_change(Request $data ) {

     User::where('id' , $data->id)->update([
        'role' => $data->main
     ]);

     $txt = [
        'status' => 'true'
     ];
     return response()->json($txt, 200);
 }


 // delete user
 public function delete_user($id){

    User::where('id' , $id)->delete();
    return redirect()->route('user_ui');
 }

 public function edit_page($id){
    $one = product::where('id' , $id)->first();
    $two = category::get();
    return view('admin.product.updateproduct' , compact('one' , 'two'));
 }

 // update product process
 public function update_product(Request $request){


    $req = [
        'name' => 'required|min:4|unique:products,name,'.$request->id,
        'price' => 'required' ,
        'time' => 'required' ,
        'pizimg' => 'required|mimes:png,jpg,jpeg,jfif|file' ,
        'text' => 'required|min:4' ,
        'category' => 'required' ,
    ];
     Validator::make($request->all() , $req)->validate();
    $u = $this->mo($request);

    if($request->hasFile('pizimg')){

        $old_data = product::where('id' , $request->id)->first();
        $pic = $old_data->image ;

        if($pic != null){
            Storage::delete('public/'.$pic);
        }

        $orgname = uniqid().$request->file('pizimg')->getClientOriginalName();
        $request->file('pizimg')->storeAs('public' , $orgname);
        $u['image'] = $orgname ;
    }


    product::where('id',$request->id)->update($u);

    return redirect()->route('product_ui');


 }
 // private function

 private function moti($a){

    return [
        'name' => $a->name ,
        'price' => $a->price ,
        'waiting_time' => $a->time ,
        'description' => $a->text ,
        'category_id' => $a->category ,

    ];
 }

 // private function

 private function mo($request){

    return [
        'name' => $request->name ,
        'price' => $request->price ,
        'waiting_time' => $request->time ,
        'description' => $request->text ,
        'category_id' =>$request->category ,

    ];
 }

}
