<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// model
use App\Model\Score;
use App\Model\Student;
use App\Model\ClassConfig;
use App\Model\LgcLog;


use DB;

// resource
use App\Http\Resources\commonResource;
use App\Http\Resources\commonCollection;


class ExpReadyController extends Controller
{
  public function expReady(Request $req)
  {

     $status = $req->status;
     $rf_id = preg_replace("/\s|-/", "", $req->rf_id);
     $timestamp = $req->timestamp;
     $settop_id = $req->settop_id;

     //log store
     $lgc_log = new LgcLog;
     $lgc_log->status = $status;
     $lgc_log->rf_id = $rf_id;
     $lgc_log->timestamp = $timestamp;
     $lgc_log->settop_id = $settop_id;

     $lgc_log->temp0 = request()->ip();

     $lgc_log->origin = 'exp_ready';
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

     if( isset($status) && isset($rf_id) && isset($settop_id))
     {
       if($status == 1)
       {

         $_config = ClassConfig::select()
                              ->where('settop_id','=',$settop_id)
                              ->first();

         $_student = Student::select()
                            ->where('rf_id','=',$rf_id)
                            ->where('status','=','1')
                            ->first();

         $score_len = Score::select()
                             ->where('student_idx','=',$_student->id)
                             ->where('class_name','=',$_config->class_name)
                             ->where('class_part','=',$_config->class_part)
                             ->count();

        ClassConfig::where('settop_id','=',$settop_id)
                    ->update(['current_user_id' => $_student->id
                            , 'current_user_name' => $_student->name]);

        Student::where('id','=',$_student->id)
                ->update([
                              'current_stage' => $settop_id
                          ]);

         if($score_len < 1){
           $insert_score = new Score;
           $insert_score->student_idx = $_student->id;
           $insert_score->class_name = $_config->class_name;
           $insert_score->class_part = $_config->class_part;
           $insert_score->item = '';
           $insert_score->score = '';
           $insert_score->pass = '';
           $insert_score->status = '0';

           $insert_score->save();
         }

         // 입구에있는 모든 체험자 정보를 가져옴
         $_enterConfig = ClassConfig::select()
                                    ->where('settop_id','=','ST1001')
                                    ->first();

         if($_enterConfig->current_user_id != null){
           $_enterId = explode('|',$_enterConfig->current_user_id);
           $_enterId = array_values(array_filter(array_map('trim',$_enterId)));

           $_enterName = explode('|',$_enterConfig->current_user_name);
           $_enterName = array_values(array_filter(array_map('trim',$_enterName)));

           // 체험 시작시 입구 current user id, current user name에서 체험자의 정보를 빼는 작업
           $pop_idx = array_keys($_enterId,$_student->id)[0];

           unset($_enterId[$pop_idx]);
           unset($_enterName[$pop_idx]);

           $_ids = implode("|", $_enterId);
           $_names = implode("|", $_enterName);

           ClassConfig::where('settop_id','=','ST1001')
                      ->update(['current_user_id' => $_ids,
                                'current_user_name' => $_names]);
         }
         // END

         //등록 == 1 || 추가 등록
         return response()->json([
           'result_code' => '200',
           'name' => $_student->name
         ]);
       }
       else
       {

         $_config = ClassConfig::select()
                              ->where('settop_id','=',$settop_id)
                              ->first();

         $_student = Student::select()
                            ->where('rf_id','=',$rf_id)
                            ->where('status','=','1')
                            ->first();

         $_score = Score::select()
                          ->where('student_idx','=',$_student->id)
                          ->where('class_name','=',$_config->class_name)
                          ->where('class_part','=',$_config->class_part)
                          ->delete();

         //등록취소 == 0
         return response()->json([
           'result_code' => '200',
           'name' => $_student->name
         ]);
       }
     }
     else
     {
       //error
       return response()->json([
         'result_code' => '404'
       ]);
     }

  }
}
