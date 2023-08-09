<?php

namespace App\Http\Controllers;

use App\Models\packorder;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\PackorderController;

class PackorderController extends Controller
{
    //

    public function nice(Request $r){

         $req = [
                    'name' => 'required|min:5',
                     'email' => 'required',
                    'phone' => 'required',
                    'people' => 'required',
                    'info' => 'required|min:5',
                ];


                Validator::make($r->all() , $req)->validate();

                packorder::create([
                    'name' => $r->name ,
                    'email' => $r->email,
                    'phone' => $r->phone ,
                    'people' => $r->people ,
                    'content' => $r->info ,
                    'user_id' => $r->user_id,
                    'package_id'=>$r->package_id,
                ]);

                return redirect()->route('ui_about');



    }
}
