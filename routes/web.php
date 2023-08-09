<?php

use App\Http\Controllers\userpage;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChefController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PackorderController;
use App\Http\Controllers\ProductcartController;
use App\Http\Controllers\ProductorderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::middleware(['auth'])->group(function () { Route::get('/dashboard', function () { return view('home');})->name('dashboard');

//start


// admin middleware
Route::middleware('adminmiddleware')->group( function () {

// go to admin main ui
Route::get('admin_page' , [CategoryController::class , 'admin_page'])->name('ui_admin');

// go to create category
Route::get('category_create' , [CategoryController::class , 'category_create'])->name('ui_category_create');

// create category process
Route::post('create_category' , [CategoryController::class , 'create_category'])->name('create_process');


// delete process
Route::get('delete/{id}' , [CategoryController::class , 'delete_category'])->name('delete_process');

// update ui
Route::get('editpage/{id}' , [CategoryController::class , 'edit_category'])->name('edit_ui');

// update process
Route::post('update_page' , [CategoryController::class , 'update_category'])->name('update_ui');

// user info ui
Route::get('admin_detail' , [CategoryController::class , 'detail_account'])->name('account_detail');

// update  admin info  process
Route::post('admin_profile' , [CategoryController::class , 'admin_profile_ch'])->name('admin_chpro');


// create product ui
Route::get('product_create' , [ProductController::class , 'create_product'])->name('product_ui');


// create product form ui
ROUTE::get('form_ui' , [ProductController::class , 'form_cre'])->name('create_products');

 // create product process
ROUTE::post('create_product' , [ProductController::class , 'create_pro'])->name('create_pro');

// delete product
ROUTE::get('delete_item/{id}' , [ProductController::class , 'delete_item'])->name('delete_pro');



// change password ui
ROUTE::get('change_page' , [ProductController::class , 'change_ui'])->name('change_ui');

// change password process
ROUTE::post('change_pass' , [ProductController::class , 'change_pass'])->name('change_pro');


// user list  ui
ROUTE::get('user_list' , [ProductController::class , 'user_list'])->name('user_ui');


// ajax with user to admin
Route::get('userch' , [ProductController::class , 'user_change'])->name('user_change');

// delete user if
ROUTE::get('delete_user/{id}' , [ProductController::class , 'delete_user'])->name('user_delete');

// edit page product ui
ROUTE::get('edit_page/{id}' , [ProductController::class , 'edit_page'])->name('edit_product');

// update product process
ROUTE::post('update_product' , [ProductController::class , 'update_product'])->name('update_process');

// package list page
Route::get('package' , [PackageController::class , 'package'])->name('ui_package');

// package create ui
Route::get('create_package' , [PackageController::class ,'create_package'])->name('ui_package_create');


// create process
Route::post('create_packages' , [PackageController::class , 'create_packages'])->name('create_packages_process');

// delete process
Route::get('delete_package/{id}' , [PackageController::class , 'delete_packages'])->name('delete_package_process');

// edit package ui
Route::get('edit_package_page/{id}' , [PackageController::class , 'edit_package_pages'])->name('ui_edit_package');

// update package process
Route::post('update_package' , [PackageController::class , 'update_packages'])->name('update_package_process');

// go to chef list
Route::get('chef_lists' , [PackageController::class , 'chef_lists'])->name('cheflist_ui');

// go to chef create
Route::get('chef_create' , [PackageController::class , 'chef_create'])->name('ui_chef_create');

// create chef process
Route::post('chef_create_pro' , [ChefController::class , 'chef_create_pros'])->name('chef_create_process');

// delete chef process
Route::get('chef_delete_pro/{id}' , [ChefController::class , 'chef_delete'])->name('chef_delete_process');

// edit chef ui
Route::get('chef_edit_page/{id}',[ChefController::class , 'chef_edit_pages'])->name('chef_edit_ui');


// update chef process
Route::post('chef_update_process' , [ChefController::class ,'chef_update_processs'])->name('chef_update_pro');

// gallery list
Route::get('gallery_list',[ProductcartController::class ,'gallery_lists'])->name('ui_gallerylist');

// gallery create page
Route::get('gallery_page' , [ProductcartController::class , 'gallery_pages'])->name('ui_gallery');

// gallery create process
Route::post('gallery_create' , [ProductcartController::class ,'gallery_creates'])->name('pro_gallery_create');

// delete gallery
Route::get('gallery_delete/{id}',[ProductcartController::class , 'gallery_deletes'])->name('pro_gallery_delete');

// contact list ui
Route::get('contact_list_page',[ProductorderController::class , 'contact_list_pages'])->name('ui_contact_list');

// order list
Route::get('orderlist_page' , [ProductorderController::class , 'orderlist_pages'])->name('ui_orderlist_page');

// order list delete

Route::get('order_list_delete/{id}' , [ProductorderController::class , 'order_list_deletes'])->name('pro_order_delete');

// change status with ajax
Route::get('change_status' , [ProductorderController::class , 'change_statuss']);

// order code detail
Route::get('order_code/{code}' , [ProductorderController::class , 'order_codes'])->name('ui_order_code');
});


// user middleware
Route::middleware('usermiddleware')->group( function () {


// go to user main ui
Route::get('user_page' , [CategoryController::class , 'user_page'])->name('ui_user');

// go to about page
Route::get('about_page' , [userpage::class , 'about'])->name('ui_about');


// go to product and  category
Route::get('category_product' , [userpage::class , 'product_cat'])->name('ui_pro_cat');



// category select ui and process
Route::get('category_sereach/{id}' , [userpage::class , 'search'])->name('search_pro');

// packages and chef ui
Route::get('package_chef' , [userpage::class , 'package_chef'])->name('ui_package_chef');

//add to cart
ROUTE::get('cart_page/{id}',[userpage::class , 'cart_pages'])->name('ui_cart');

// add to product cart process
Route::get('addtocart',[ProductcartController::class , 'add_to_carts']);


//cart list list
Route::get('cart_list_page', [ProductcartController::class , 'cart_list_pages'])->name('ui_cart_list');


// delete one cart
Route::get('cart_delete/{id}',[ProductcartController::class , 'cart_delete_processs'])->name('cart_delete_one');

// all product order process
Route::get('productordering',[ProductcartController::class , 'productorderings']);

// contact ui
Route::get('contact_page',[ProductcartController::class , 'contact_pages'])->name('ui_contact');

// product order list
Route::get('order_page' , [ProductcartController::class , 'order_pages'])->name('ui_orderpage');


// customer create contact
Route::post('contact_create_page',[ProductcartController::class , 'contact_creasing'])->name('contact_create');

// package order ui
Route::get('package_order_page/{id}' , [PackageController::class , 'package_order_pages'])->name('ui_package_order_page');



// package order process
ROUTE::post('packages_ordering' , [PackorderController::class , 'nice'])->name('pro_pack_ordering'); //

// setting ui
Route::get('setting_page' ,[ProductorderController::class , 'setting_pages'])->name('ui_setting_page');

// update profile process
ROUTE::post('update_user_profile' , [ProductorderController::class , 'update_user_profiles'])->name('pro_user_ch_profile');


// ui user password

ROUTE::get('password_user_page' , [ProductorderController::class , 'password_user_pages'])->name('ui_user_password');

// password change process
ROUTE::post('user_pass_change' , [ProductorderController::class , 'user_pass_changes'])->name('pro_user_changing');

// view count process
Route::get('view' , [ProductorderController::class , 'views'])->name('view_pro');

});



});







// register ui
Route::get('/' , [CategoryController::class , 'register_page'])->name('ui_register')->middleware('adminmiddleware');
Route::get('register_page' , [CategoryController::class , 'register_page'])->name('ui_register')->middleware('adminmiddleware');

// login ui
Route::get('login_page' , [CategoryController::class , 'login_page'])->name('ui_login')->middleware('adminmiddleware');




// process to after authenication user or admin decided
Route::get('dash' , [CategoryController::class , 'decide'])->name('ui_decide');
