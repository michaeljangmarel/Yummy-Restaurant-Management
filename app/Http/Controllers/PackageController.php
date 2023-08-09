<?php

namespace App\Http\Controllers;

use App\Models\chef;
use App\Models\package;
use App\Models\packageorder;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\PackageController;

class PackageController extends Controller
{
    // list
    public function package(){
        $pack = package::get();
        return view('admin.package.package' , compact('pack'));
    }

    // create package ui
    public function create_package(){
        return view('admin.package.createpackage');
    }

    // create process
    public function create_packages(Request $request){
        $this->vali($request);
        $cre = $this->creates($request);

        if($request->hasFile('photo')){

            $org = uniqid().$request->file('photo')->getClientOriginalName();
            $request->file('photo')->storeAs('public' , $org);
            $cre['image'] = $org;

        }

        package::create($cre);
        return redirect()->route('ui_package');
     }

     // delete package process

     public function delete_packages($id){
        package::where('id' , $id)->delete();
        return redirect()->route('ui_package');
     }

      // edit ui
      public function edit_package_pages($id){
        $a = package::where('id' , $id)->first();
        return view('admin.package.editpackage' , compact('a'));
      }

      // update process

      public function update_packages(Request $b){
        $this->valis($b);
        $up = $this->updata($b);
        if($b->hasFile('photo')){

            $org = uniqid().$b->file('photo')->getClientOriginalName();
            $b->file('photo')->storeAs('public' , $org);
            $up['image'] = $org;

        }


        package::where('id' , $b->id)->update($up);
        return redirect()->route('ui_package');


       }

     // chef list

     public function chef_lists(){
        $data = chef::orderBy('created_at' , 'desc')->get();
        return view('admin.chef.cheflist' , compact('data'));
     }

     // package order page
     public function package_order_pages($id){
        $one = package::where('id' , $id)->first();
        return view('user.packagedetail.packagedetails' , compact('one'));
     }


     // package order process

    //  public function package_order_processs(Request $r){
    //     $req = [
    //         'name' => 'required',
    //         'package_id' => 'required',
    //         'email' => 'required',
    //         'phone' => 'required|unique:packageorders,phone',
    //         'people' => 'required',
    //         'info' => 'required|min:5',

    //     ];
    //     Validator::make($r->all() , $req)->validate();

    //     dd($r->all());



    //   }

     // chef create

     public function chef_create(){
        return view('admin.chef.chefcreate');
     }

     // private function

     private function vali($request){
        $req = [
            'photo' => 'required|mimes:jpg,jpeg,png|file',
            'name' => 'required|unique:packages,name',
            'price' => 'required',
            'content' => 'required|min:5',
            'less' => 'required',
            'most' => 'required',

        ];
        Validator::make($request->all() , $req )->validate();

     }

     private function creates($request){
         return [
            'name' => $request->name ,
            'price' => $request->price ,
            'info' => $request->content ,
            'less' => $request->less ,
            'most' => $request->most ,
         ];
     }

     private function valis($b){
        $req = [
            'photo' => 'required|mimes:jpg,jpeg,png|file',
            'name' => 'required|unique:packages,name,'.$b->id,
            'price' => 'required',
            'content' => 'required|min:5',
            'less' => 'required',
            'most' => 'required',

        ];
        Validator::make($b->all() , $req )->validate();

     }
     private function updata($b){
        return [
           'name' => $b->name ,
           'price' => $b->price ,
           'info' => $b->content ,
           'less' => $b->less ,
           'most' => $b->most ,
        ];
    }
    }



