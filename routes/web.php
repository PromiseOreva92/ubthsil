<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;

Route::get('/',[PagesController::class,'login']);
Route::get('home',[PagesController::class,'index']);
Route::get('about-idcapitals',[PagesController::class,'about']);
Route::get('terms-and-conditions',[PagesController::class,'terms']);
Route::get('privacy-policy',[PagesController::class,'policy']);

Route::get('verify-me/{id}/{code}',[PagesController::class,'verifyme']);


Route::get('forgot-password',[PagesController::class,'forgot_password']);
Route::post('recover-email',[PagesController::class,'recover_email'])->name('recover-email');
Route::get('reset/{id}/{code}',[PagesController::class,'reset']);
Route::post('set-new-password',[PagesController::class,'set_new_password'])->name('set-new-password');





Route::get('/login',[PagesController::class,'login'])->name('login');
Route::get('/signup',[PagesController::class,'signup']);

Route::post('/add_user',[PagesController::class,'add_user']);

Route::post('auth_user',[CustomerController::class,'authuser'])->name('auth_user');
Route::post('otp_check',[CustomerController::class,'otp_check'])->name('otp_check');


Route::get('mydesk.me/home',[CustomerController::class,'dashboard'])->middleware('auth');
Route::get('mydesk.me/document/{id}',[CustomerController::class,'view_doc'])->middleware('auth');
Route::get('mydesk.me/print_document/{id}',[CustomerController::class,'print_doc'])->middleware('auth');
Route::get('mydesk.me/create_document',[CustomerController::class,'create_document'])->middleware('auth');

Route::post('mydesk.me/input_comment',[CustomerController::class,'input_comment'])->name('input_comment');
Route::post('mydesk.me/forward_doc',[CustomerController::class,'forward_doc'])->name('forward_doc');

Route::post('mydesk.me/create_account',[CustomerController::class,'create_account'])->name('create_account');

Route::post('mydesk.me/edit_user',[CustomerController::class,'edit_user'])->name('edit_user');

Route::get('mydesk.me/newprofile',[CustomerController::class,'newprofile'])->middleware('auth');

Route::get('mydesk.me/factor-auth',[CustomerController::class,'factor_auth'])->middleware('auth');

Route::get('mydesk.me/myprofile',[CustomerController::class,'profile'])->middleware('auth');
Route::get('mydesk.me/selfservice',[CustomerController::class,'selfservice'])->middleware('auth');
Route::get('mydesk.me/upload_doc',[CustomerController::class,'upload_doc'])->middleware('auth');
Route::get('mydesk.me/upload_man',[CustomerController::class,'upload_man'])->middleware('auth');
Route::post('mydesk.me/upload_document',[CustomerController::class,'upload_document'])->name('upload_document');

Route::post('mydesk.me/upload_mandate',[CustomerController::class,'upload_mandate'])->name('upload_mandate');

Route::get('mydesk.me/selfservice',[CustomerController::class,'selfservice'])->middleware('auth');

Route::get('mydesk.me/signature_upload',[CustomerController::class,'signature_upload'])->middleware('auth');


Route::get('mydesk.me/archive/{id}',[CustomerController::class,'archive'])->name('archive');

Route::get('mydesk.me/delete_doc/{id}',[CustomerController::class,'delete_doc']);


Route::get('mydesk.me/unarchive/{id}',[CustomerController::class,'unarchive'])->name('unarchive');

Route::get('mydesk.me/archived_documents',[CustomerController::class,'archived_documents'])->middleware('auth');
Route::get('mydesk.me/my_history',[CustomerController::class,'my_history'])->middleware('auth');
Route::get('mydesk.me/mytickets',[CustomerController::class,'tickets'])->middleware('auth');

Route::get('mydesk.me/logout',[CustomerController::class,'logout']);
Route::post('mydesk.me/send_money',[CustomerController::class,'send_money'])->name('send_money');
Route::post('mydesk.me/create_wallet',[CustomerController::class,'create_wallet'])->name('create_wallet');
Route::post('mydesk.me/receive_money',[CustomerController::class,'receive_money'])->name('receive_money');
Route::post('mydesk.me/invest_money',[CustomerController::class,'invest_money'])->name('invest_money');
Route::post('mydesk.me/submit_ticket',[CustomerController::class,'submit_ticket'])->name('submit_ticket');
Route::get('mydesk.me/settings',[CustomerController::class,'settings'])->middleware('auth');
Route::post('mydesk.me/change_password',[CustomerController::class,'change_password'])->name('change_password');
Route::post('mydesk.me/change_userpassword',[CustomerController::class,'change_userpassword'])->name('change_userpassword');
Route::get('mydesk.me/delete_user/{id}',[CustomerController::class,'delete_user'])->name('delete_user');
Route::get('mydesk.me/my-kyc',[CustomerController::class,'my_kyc'])->middleware('auth');
Route::post('mydesk.me/update_profile',[CustomerController::class,'update_profile'])->name('update_profile');


Route::post('mydesk.me/upload_signature',[CustomerController::class,'upload_signature'])->name('upload_signature');












