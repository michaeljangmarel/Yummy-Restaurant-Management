<?php

namespace App\Http\Controllers;
use Storage ;
use App\Models\chef;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Controllers\ChefController;
use Illuminate\Support\Facades\Validator;

class ChefController extends Controller
{
    // chef create process

    public function chef_create_pros(Request $r){
        $req = [
            'name' => 'required',
            'email' => 'required|unique:chefs,email',
            'content' => 'required',
            'photo' => 'required|mimes:jpg,jpeg,png|file',
            'role' => 'required'
        ];
        Validator::make($r->all() ,$req )->validate();
        $data = $this->moti($r);


        if($r->hasFile('photo')){

            $org = uniqid().$r->file('photo')->getClientOriginalName();
            $r->file('photo')->storeAs('public' , $org);
            $data['image'] = $org;
        }

        chef::create($data);
        return redirect()->route('cheflist_ui');
     }

     // chef delete process

     public function chef_delete($id){
         chef::where('id' , $id)->delete();
         return redirect()->route('cheflist_ui');
     }

     // chef edit ui

     public function chef_edit_pages($id){
        $d = chef::where('id' , $id)->first();
        return view('admin.chef.editchef' , compact('d'));
     }

     // chef update process
     public function chef_update_processs(Request $cc){

         $reqs = [
            'name' => 'required|unique:chefs,name,'.$cc->id,
            'email' => 'required|unique:chefs,email,'.$cc->id,
            'content' => 'required',
            'photo' => 'required|mimes:jpg,jpeg,png|file',
            'role' => 'required',
        ];
        Validator::make($cc->all() ,$reqs )->validate();
        $ups = $this->nn($cc);

        if($cc->hasFile('photo')){

            $old = chef::where('id' , $cc->id)->first();
            $oldphoto = $old->image ;

            if($oldphoto != null){
                Storage::delete('public/'.$oldphoto);
            }

            $org = uniqid().$cc->file('photo')->getClientOriginalName();
            $cc->file('photo')->storeAs('public' , $org);
            $ups['image'] = $org;
        }

        chef::where('id' , $cc->id)->update($ups);
        return redirect()->route('cheflist_ui');




      }

     // private

     private function moti($r){

        return [
            'name' => $r->name ,
            'email'=>$r->email ,
            'content' => $r->content ,
            'role' => $r->role
        ];
     }

     private function nn($cc){
        return [
            'name' => $cc->name ,
            'email'=>$cc->email ,
            'content' => $cc->content ,
            'role' => $cc->role
        ];
     }
}
