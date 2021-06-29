<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*
|--------------------------------------------------------------------------
|  Site API
|--------------------------------------------------------------------------
*/

Route::resource('experience','API\ExperienceController');

Route::resource('class','API\ClassController');

Route::resource('reservate','API\ReservateController');

Route::resource('deleteClass','API\ClassDeleteController');

Route::resource('dept','API\DeptController');

Route::resource('score','API\ScoreController');

/*
|--------------------------------------------------------------------------
| LG chemistry Api
|--------------------------------------------------------------------------
*/

Route::get('attendanceList','API\AttendanceController@list');     // 체험자 리스트 전송

Route::get('attendance','API\AttendanceController@attendance'); //체험자 출석 처리

Route::get('exp_ready','API\ExpReadyController@expReady');  //체험자 체험장 등록/등록취소/추가등록 처리

Route::get('exp_start','API\ExpStartController@expStart');  //체험자 체험 시작/취소 처리

Route::get('exp_end','API\ExpEndController@expEnd');  //체험자 체험 종료 처리

Route::get('exit','API\ExitController@exit'); //체험자 종료 처리

Route::get('exp_person','API\ExpPersonController@check'); //체험장 체험자 RFID 코드 조회


/*
|--------------------------------------------------------------------------
| LG Set-top API
|--------------------------------------------------------------------------
*/

Route::resource('get_apk', 'API\ApkController');              // 셋탑관련 APK 호출 페이지 작업


/*
|--------------------------------------------------------------------------
| LG SMS, MMS API
|--------------------------------------------------------------------------
*/
Route::resource('send_msg', 'API\MMSController');              // SMS , MMS 전송

/*
|--------------------------------------------------------------------------
| Add learn List Store api
|--------------------------------------------------------------------------
*/
Route::get('add_learn','API\AddLearnController@store');
