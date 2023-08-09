<?php

namespace App\Http\Controllers;
use Storage ;
use App\Models\User;
use App\Models\product;
use App\Models\contactinfo;
use App\Models\productorder;
use Illuminate\Http\Request;
use App\Models\productorderlist;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ProductorderController;

class ProductorderController extends Controller
{
    // contact list

    public function contact_list_pages(){
        $c = contactinfo::orderBy('created_at' , 'desc')->get();
        return view('admin.contactinformation.contactlist' , compact('c'));
    }

    // product order list
    public function orderlist_pages(){
        $o = productorder::select('productorders.*' , 'users.name as usname')->when(request('co'),function($b){
            $sc = request('co');
            $b->orWhere('order_code' , 'like','%'.$sc.'%');
        })->join('users' , 'productorders.user_id' , 'users.id')->orderBy('created_at' , 'desc')->get();
        return view('admin.productorderlist.productorderlist', compact('o'));
    }

    // delete order
    public function order_list_deletes($id){
        productorder::where('id' , $id)->delete();
        return redirect()->route('ui_orderlist_page');
    }

    // change status
    public function change_statuss(Request $a){
        productorder::where('id' , $a->id)->update([
            'status' => $a->opt
        ]);

        $data = [
            'tex' => 'ok'
        ];

        return response()->json($data, 200 );
     }

     // order code product detail

     public function order_codes($code){
        $sub = 0 ;
        $or = productorderlist::select('productorderlists.*' , 'products.name as proname' , 'products.image as proimg' , 'products.price as proprice' , 'users.name as usname')->join('products' , 'productorderlists.product_id' , 'products.id')->join('users' , 'productorderlists.user_id' , 'users.id')->where('order_code' , $code)->get();

        foreach($or as $as){
            $sub += $as->total ;
        }

        return view('admin.productorderdetail.orderdetail' , compact('or' , 'sub'));
     }

     // ui setting

     public function setting_pages(){
        return view('user.accountsetting.accountsettings');
     }


     // update process

     public function update_user_profiles(Request $request){


        $reqs = [
            'name' => 'required|unique:users,name,'.Auth::user()->id,
            'email' => 'required|unique:users,email,'.Auth::user()->id,
            'phone' => 'required|unique:users,phone,'.Auth::user()->id,
            'gender' => 'required',
            'photo' => 'required|mimes:jpg,jpeg,png|file',
            'address' => 'required|min:4',
        ];

        Validator::make($request->all() ,$reqs)->validate();
        $aa = $this->datas($request);


        if($request->hasFile('photo')){

            $oldphoto = User::where('id' ,Auth::user()->id)->first();
            $real = $oldphoto->img ;


                 if($real != null){
                    Storage::delete('public/'.$real);
                  }

                $org = uniqid().'yummy'.$request->file('photo')->getClientOriginalName();
                $request->file('photo')->storeAs('public' , $org);
                $aa['img'] = $org ;
            }

            User::where('id',Auth::user()->id)->update($aa);
            return redirect()->route('ui_user')->with([
                'up' => 'Updated Profile'
            ]);


     }

     // ui user password

     public function password_user_pages(){
        return view('user.userpassword.passworduser');
     }

     // change user process

     public function user_pass_changes(Request $req){
        $mess = [
            'old' => 'required|min:5',
            'new' => 'required|min:5',
            'con' => 'required|min:5|same:new',

        ];
        Validator::make($req->all() , $mess)->validate();

        $old = User::where('id' , Auth::user()->id)->first();
        $oldpassword = $old->password;

        if(Hash::check($req->old , $oldpassword)){

            User::where('id' , Auth::user()->id)->update([
                'password' => Hash::make($req->new)
            ]);

            return redirect()->route('ui_user_password')->with([
                'chch' => 'Updated Password',
            ]);

        }

      }


      public function views(Request $s){

        $one = product::where('id' , $s->id)->first();

        product::where('id' , $s->id)->update([
            'view_count' => $one->view_count + 1
        ]);

      }


     private function datas($request){
        return [
           'name' => $request->name ,
           'email' => $request->email,
            'phone' => $request->phone ,
           'gender' => $request->gender,
           'address' => $request->address
         ];
   }
}
