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


class ExpStartController extends Controller
{
  public function expStart(Request $req)
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
      $lgc_log->origin = 'exp_start';
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

     if(isset($status) && isset($rf_id) && isset($settop_id) && isset($timestamp)){
       if($status == 1)
       {
           // CPR 메인기기에 대한 처리
           // CPR 은 RF_ID 가 CPR 기기 순서라고 생각.
           if($settop_id == "ST4005"){
             $_config = ClassConfig::select()
                                 ->where('class_name','=','CPR')
                                 ->where('class_part','=',$rf_id)
                                 ->first();

             $_student = Student::select()
                                ->where('id','=',$_config->current_user_id)
                                ->where('status','=','1')
                                ->first();

            $score_len = Score::select()
                               ->where('student_idx','=',$_student->id)
                               ->where('class_name','=',$_config->class_name)
                               ->where('class_part','=',$rf_id)
                               ->count();

             if($score_len == 0){
               $insert_score = new Score;
               $insert_score->student_idx = $_student->id;
               $insert_score->class_name = $_config->class_name;
               $insert_score->class_part = $_config->class_part;
               $insert_score->item = '';
               $insert_score->score = '';
               $insert_score->pass = '';
               $insert_score->status = '1';

               $insert_score->save();
             }else{
               // 등록에 들어간 값이 있으면 업데이트
               $score = Score::where('student_idx','=',$_student->id)
                                 ->where('class_name','=',$_config->class_name)
                                 ->where('class_part','=',$_config->class_part)
                                 ->update(['status' => '1']);
             }

             //등록 == 1 || 추가 등록
             return response()->json([
               'result_code' => '200',
               'name' => $_student->name
             ]);
           }

           $_config = ClassConfig::select()
                                ->where('settop_id','=',$settop_id)
                                ->first();

           $_student = Student::select()
                              ->where('rf_id','=',$rf_id)
                              ->where('status','=','1')
                              ->first();

           if(!isset($_student)){
             return response()->json([
               'result_code' => '404'
             ]);
           }
           $score_len = Score::select()
                               ->where('student_idx','=',$_student->id)
                               ->where('class_name','=',$_config->class_name)
                               ->where('class_part','=',$_config->class_part)
                               ->count();

           ClassConfig::where('settop_id','=',$settop_id)
                       ->update(['current_user_id' => $_student->id
                               , 'current_user_name' => $_student->name]);


           if($score_len == 0){
             $insert_score = new Score;
             $insert_score->student_idx = $_student->id;
             $insert_score->class_name = $_config->class_name;
             $insert_score->class_part = $_config->class_part;
             $insert_score->item = '';
             $insert_score->score = '';
             $insert_score->pass = '';
             $insert_score->status = '1';

             $insert_score->save();
           }else{
             // 등록에 들어간 값이 있으면 업데이트
             $score = Score::where('student_idx','=',$_student->id)
                               ->where('class_name','=',$_config->class_name)
                               ->where('class_part','=',$_config->class_part)
                               ->update(['status' => '1']);
           }

           //등록 == 1 || 추가 등록
           return response()->json([
             'result_code' => '200',
             'name' => $_student->name
           ]);
       } else {
            $_config = ClassConfig::select()
                                 ->where('settop_id','=',$settop_id)
                                 ->first();

            $_student = Student::select()
                               ->where('rf_id','=',$rf_id)
                               ->where('status','=','1')
                               ->first();

            $_score = Score::where('student_idx','=',$_student->id)
                              ->where('class_name','=',$_config->class_name)
                              ->where('class_part','=',$_config->class_part)
                              ->update(['status' => '0']);

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
