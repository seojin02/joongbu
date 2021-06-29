<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// model
use App\Model\ExperienceClass;
use App\Model\ClassDetail;
use App\Model\Student;
use App\Model\ClassConfig;
use App\Model\LgcLog;

use DB;

// resource
use App\Http\Resources\commonResource;
use App\Http\Resources\commonCollection;

class AttendanceController extends Controller
{

  public function list(Request $req){

    $data = ExperienceClass::selectRaw("lgc_class.id AS `classKey`, CONCAT(lgc_class.start_time, ':00') AS `startTime`
                                      , lgc_class_detail.dept AS `dept`, lgc_class_student_detail.id AS `user_id`, lgc_class_student_detail.name AS `name`
                                      , lgc_class_student_detail.status AS `status`, lgc_class_student_detail.rf_id AS `rf_id`")
                            ->leftJoin("lgc_class_detail", "lgc_class.id", "=", "lgc_class_detail.class_idx")
                            ->leftJoin("lgc_class_student_detail", "lgc_class.id", "=", "lgc_class_student_detail.class_idx")
                            ->whereRaw("DATE(lgc_class.start_date) = DATE(NOW())")
                            ->whereRaw("HOUR(NOW()) BETWEEN lgc_class.start_time AND lgc_class.end_time")
                            ->get();

    return new commonCollection($data);
  }


  public function attendance(Request $req)
  {

    $status = $req->status;
    $rf_id = preg_replace("/\s|-/", "", $req->rf_id);
    $settop_id = $req->settop_id;
    $user_id = $req->user_id;
    $user_name = $req->user_name;
    $timestamp = $req->timestamp;

    $_config = ClassConfig::select()
                          ->where('settop_id','=',$settop_id)
                          ->first();

    $_configCheck = explode('|',$_config->current_user_id);
    $_configSwt = 0;

    for($i=0; $i<count($_configCheck); $i++){
      if($_configCheck[$i] == $user_id) {
        $_configSwt++;
        break;
      }
    }

    if($_configSwt == 0){
      ClassConfig::where('settop_id','=',$settop_id)
                  ->update(['current_user_id' => $_config->current_user_id.$user_id.'|'
                  , 'current_user_name' => $_config->current_user_name.$user_name.'|']);
    }
    //log store
    $lgc_log = new LgcLog;
    $lgc_log->status = $status;
    $lgc_log->rf_id = $rf_id;
    $lgc_log->settop_id = $settop_id;
    $lgc_log->user_id = $user_id;
    $lgc_log->user_name = $user_name;
    $lgc_log->timestamp = $timestamp;

    $lgc_log->temp0 = request()->ip();
    $lgc_log->origin = 'attendance';
    $lgc_log->save();

    //RFID 16진수 체크
    if(!preg_match("/[a-fA-F0-9]/", $rf_id)){
      return response()->json([
        'result_code' => '400'
      ]);
    }

    //날짜 형식 체크
    if(!preg_match("/^(19|20)\d{2}(0[1-9]|1[012])(0[1-9]|[12][0-9]|3[0-1])(0[0-9]|1[0-9]|2[0-3])([0-5][0-9])([0-5][0-9])$/", $timestamp) ){
      return response()->json([
        'result_code' => '403'
      ]);
    }

    if( isset($status) && isset($rf_id) && isset($settop_id) && isset($user_id) )
    {
      if($status == "1"){
        // 출석
        $_student = Student::where('id','=',$user_id)
                            ->update(['status' => $status
                                    , 'in_time' => DB::Raw("now()")
                                    , 'current_stage' =>  $settop_id
                                    , 'rf_id' => trim($rf_id)]);

        //error
        return response()->json([
          'result_code' => '200'
        ]);
      }else{
        // 출석취소
        $_student = Student::where('id','=',$user_id)
                            ->update(['status' => '0'
                                    , 'out_time' => now()
                                    , 'rf_id' => '']);

        //error
        return response()->json([
          'result_code' => '200'
        ]);
      }

      //
    }else
    {
      //error
      return response()->json([
        'result_code' => '404'
      ]);
    }

  }


}
