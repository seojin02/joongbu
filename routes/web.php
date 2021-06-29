<?php

  use App\Events\MyEvent;
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


/*
|--------------------------------------------------------------------------
|  페이지
|--------------------------------------------------------------------------
*/

Route::resource('/','MainController')->middleware('auth');

Route::resource('/home','MainController')->middleware('auth');

Route::get('/createClass','ClassController@create')->middleware('auth');

Route::get('/reservationClass','ClassController@reservationClass')->middleware('auth');

Route::get('/roomList','ClassController@room')->middleware('auth');

Route::get('/resultClass','ClassController@result')->middleware('auth');

Route::get('/resultClass/user','ClassController@user')->middleware('auth');

/*
|--------------------------------------------------------------------------
| 사용자 예약 페이지
|--------------------------------------------------------------------------
*/

Route::get('/reservation','ClassController@reservation');


/*
|--------------------------------------------------------------------------
| 인증 관련 목록
|--------------------------------------------------------------------------
*/

Auth::routes();

// 로그아웃 처리
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

//  회원 가입 방지
Route::redirect('/register', 404);

/*
|--------------------------------------------------------------------------
| Access Log
|--------------------------------------------------------------------------
*/
Route::get('read-access-log', 'LogController@access');
