<?php

namespace App\Http\Controllers;
use Storage ;
use App\Models\User;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\CategoryController;

class CategoryController extends Controller
{

    // register page
    public function register_page(){
        return view('register_ui');
    }

    // login page
    public function login_page() {
        return view('login_ui');
    }

    // admin
    public function admin_page() {
        $categorylist = category::when(request('scr') , function ($a) {
            $key = request('scr');
            $a->orWhere('name' , 'like' , '%'.$key.'%');
        })->orderBy('created_at' , 'desc')->paginate(4);
        return view('admin.admin_ui' , compact('categorylist'));
    }
    // user
    public function user_page() {
        return view('user.user_ui');
    }

    // decide user or admin with role
    public function decide(){

        if(Auth::user()->role == 'user'){
            return redirect()->route('ui_user');
        }else{
            return redirect()->route('ui_admin');
        }
    }

    // go to category create page

    public function category_create(){
        return view('admin.create_category');
    }

    // create process

    public function create_category(Request $data){

        Validator::make($data->all() , ['name' => 'required|unique:categories,name'])->validate();

        category::create([
            'name' => $data->name
        ]);

        return redirect()->route('ui_admin');
     }

     // delete process

     public function delete_category($id){

        category::where('id' , $id)->delete();

        return redirect()->route('ui_admin');
     }

     // edit ui

     public function edit_category($id){

        $one = category::where('id' , $id)->first();
        return view('admin.update' , compact('one'));
      }

      // update

      public function update_category(Request $req) {

        Validator::make($req->all() , ['name' => 'required|unique:categories,name,'.$req->id])->validate();

         category::where('id' , $req->id)->update([
            'name' => $req->name
         ]);

         return redirect()->route('ui_admin');
        }

        // account ui

        public function detail_account() {
           return view('admin.account.update_account');
        }

        // change process
        public function admin_profile_ch(Request $request) {

            $id = $request->id ;

            $reqs = [
                'name' => 'required',
                'email' => 'required',
                'address' => 'required',
                'phone' => 'required',
                'gender' => 'required',
                'photo' => 'mimes:jpg,jpeg,png|file'
            ];

            Validator::make($request->all() ,$reqs)->validate();


              $aa = $this->datas($request);

            if($request->hasFile('photo')){

            $oldphoto = User::where('id' ,$id)->first();
            $real = $oldphoto->img ;


                 if($real != null){
                    Storage::delete('public/'.$real);
                  }

                $org = uniqid().'yummy'.$request->file('photo')->getClientOriginalName();
                $request->file('photo')->storeAs('public' , $org);
                $aa['img'] = $org ;
            }

             User::where('id',$id)->update($aa);
             return redirect()->route('account_detail');

            }



            private function datas($request){
                 return [
                    'name' => $request->name ,
                    'email' => $request->email,
                    'address' => $request->address,
                    'phone' => $request->phone ,
                    'gender' => $request->gender,
                  ];
            }
}
