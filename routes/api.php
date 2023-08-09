<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProjectApi;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// all product

Route::get('products'  , [ProjectApi::class , 'product']);

// get one product

Route::get('product/{no}' , [ProjectApi::class , 'product_one']);

// all category

Route::get('categories' , [ProjectApi::class , 'cate']);

//all chef

Route::get('chefs' , [ProjectApi::class , 'chef']);


// all user

Route::get('users' , [ProjectApi::class , 'users']);


// delete one product api

Route::get('ProductDelete/{id}' , [ProjectApi::class , 'prodele']);


// update  chef name

Route::post('chefname' , [ProjectApi::class , 'chefnames']);
