<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AdminloginController;

use App\Http\Controllers\Auth\Admin_controller;

use App\Http\Controllers\user_controller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[user_controller::class,'index']);

Route::get('/about',[user_controller::class,'about']);

Route::get('/service',[user_controller::class,'service']);

Route::get('/gallary',[user_controller::class,'gallary']);

Route::get('/demestic',[user_controller::class,'demestic']);

Route::get('/international',[user_controller::class,'international']);

Route::get('/contact',[user_controller::class,'contact']);

Route::post('/contact_data',[user_controller::class,'contact_data']);





Route::group(['prefix'=>'admin'],function(){

    Route::get('/admin_login',[AdminloginController::class,'admin_login'])->name('login');

    Route::post('/authenticate',[AdminloginController::class,'authenticate'])->name('login_data');

    Route::get('/home',[Admin_controller::class,'home'])->name('home');

    Route::get('/forget_password',[Admin_controller::class,'forget_password'])->name('forget');

    Route::post('/send_mail',[Admin_controller::class,'send_mail'])->name('mail');

    Route::get('/confirm_otp/{id}',[Admin_controller::class,'confirm_otp'])->name('otp');

    Route::post('/verify_otp/{id}',[Admin_controller::class,'verify_otp'])->name('verify');

    Route::get('/reset_password/{id}',[Admin_controller::class,'reset_password'])->name('reset');

    Route::post('/store_password/{id}',[Admin_controller::class,'store_password'])->name('store');



    Route::get('/add_info',[Admin_controller::class,'add_info'])->name('add');

    Route::post('/store_add_info',[Admin_controller::class,'store_add_info'])->name('store_add');

    Route::get('/delete_banner_data/{id}',[Admin_controller::class,'delete_banner_data']);

    Route::get('/update_banner_data/{id}',[Admin_controller::class,'update_banner_data']);

    Route::post('/store_update_banner_data/{id}',[Admin_controller::class,'store_update_banner_data']);



    Route::get('/about',[Admin_controller::class,'about']);



    Route::get('/add_info_about',[Admin_controller::class,'add_info_about'])->name('add_about');

    Route::post('/store_add_info_about',[Admin_controller::class,'store_add_info_about'])->name('store_add_about');

    Route::get('/delete_about_data/{id}',[Admin_controller::class,'delete_about_data']);

    Route::get('/update_about_data/{id}',[Admin_controller::class,'update_about_data']);

    Route::post('/store_update_about_data/{id}',[Admin_controller::class,'store_update_about_data']);


    Route::get('/service',[Admin_controller::class,'service']);


    Route::get('/add_info_service',[Admin_controller::class,'add_info_service'])->name('add_service');

    Route::post('/store_add_info_service',[Admin_controller::class,'store_add_info_service'])->name('store_add_service');

    Route::get('/delete_service_data/{id}',[Admin_controller::class,'delete_service_data']);

    Route::get('/update_service_data/{id}',[Admin_controller::class,'update_service_data']);

    Route::post('/store_update_service_data/{id}',[Admin_controller::class,'store_update_service_data']);



    Route::get('/booking',[Admin_controller::class,'booking']);


    Route::get('/add_info_booking',[Admin_controller::class,'add_info_booking'])->name('add_booking');

    Route::post('/store_add_info_booking',[Admin_controller::class,'store_add_info_booking'])->name('store_add_booking');

    Route::get('/delete_booking_data/{id}',[Admin_controller::class,'delete_booking_data']);

    Route::get('/update_booking_data/{id}',[Admin_controller::class,'update_booking_data']);

    Route::post('/store_update_booking_data/{id}',[Admin_controller::class,'store_update_booking_data']);



    Route::get('/package',[Admin_controller::class,'package']);


    Route::get('/add_info_package',[Admin_controller::class,'add_info_package'])->name('add_package');

    Route::post('/store_add_info_package',[Admin_controller::class,'store_add_info_package'])->name('store_add_package');

    Route::get('/delete_package_data/{id}',[Admin_controller::class,'delete_package_data']);

    Route::get('/update_package_data/{id}',[Admin_controller::class,'update_package_data']);

    Route::post('/store_update_package_data/{id}',[Admin_controller::class,'store_update_package_data']);




    Route::get('/aboutus_about',[Admin_controller::class,'aboutus_about']);


    Route::get('/add_info_aboutus_about',[Admin_controller::class,'add_info_aboutus_about'])->name('add_aboutus_about');

    Route::post('/store_add_info_aboutus_about',[Admin_controller::class,'store_add_info_aboutus_about'])->name('store_add_aboutus_about');

    Route::get('/delete_aboutus_about_data/{id}',[Admin_controller::class,'delete_aboutus_about_data']);

    Route::get('/update_aboutus_about_data/{id}',[Admin_controller::class,'update_aboutus_about_data']);

    Route::post('/store_update_aboutus_about_data/{id}',[Admin_controller::class,'store_update_aboutus_about_data']);



    Route::get('/aboutus_client',[Admin_controller::class,'aboutus_client']);


    Route::get('/add_info_aboutus_client',[Admin_controller::class,'add_info_aboutus_client'])->name('add_aboutus_client');

    Route::post('/store_add_info_aboutus_client',[Admin_controller::class,'store_add_info_aboutus_client'])->name('store_add_aboutus_client');

    Route::get('/delete_aboutus_client_data/{id}',[Admin_controller::class,'delete_aboutus_client_data']);

    Route::get('/update_aboutus_client_data/{id}',[Admin_controller::class,'update_aboutus_client_data']);

    Route::post('/store_update_aboutus_client_data/{id}',[Admin_controller::class,'store_update_aboutus_client_data']);




    Route::get('/aboutus_team',[Admin_controller::class,'aboutus_team']);


    Route::get('/add_info_aboutus_team',[Admin_controller::class,'add_info_aboutus_team'])->name('add_aboutus_team');

    Route::post('/store_add_info_aboutus_team',[Admin_controller::class,'store_add_info_aboutus_team'])->name('store_add_aboutus_team');

    Route::get('/delete_aboutus_team_data/{id}',[Admin_controller::class,'delete_aboutus_team_data']);

    Route::get('/update_aboutus_team_data/{id}',[Admin_controller::class,'update_aboutus_team_data']);

    Route::post('/store_update_aboutus_team_data/{id}',[Admin_controller::class,'store_update_aboutus_team_data']);






    Route::get('/gallary_image',[Admin_controller::class,'gallary_image']);



    Route::get('/add_info_gallary_image',[Admin_controller::class,'add_info_gallary_image'])->name('add_gallary_image');

    Route::post('/store_add_info_gallary_image',[Admin_controller::class,'store_add_info_gallary_image'])->name('store_add_gallary_image');

    Route::get('/delete_gallary_image_data/{id}',[Admin_controller::class,'delete_gallary_image_data']);

    Route::get('/update_gallary_image_data/{id}',[Admin_controller::class,'update_gallary_image_data']);

    Route::post('/store_update_gallary_image_data/{id}',[Admin_controller::class,'store_update_gallary_image_data']);




    Route::get('/bg_page',[Admin_controller::class,'bg_page']);

    Route::get('/update_bg_page/{id}',[Admin_controller::class,'update_bg_page']);

    Route::post('/store_update_bg_page/{id}',[Admin_controller::class,'store_update_bg_page']);


    Route::get('/change_admin_password/{id}',[Admin_controller::class,'change_admin_password']);

    Route::post('/store_change_admin_password/{id}',[Admin_controller::class,'store_change_admin_password']);



});
