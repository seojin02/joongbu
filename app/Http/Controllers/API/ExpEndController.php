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

class ExpEndController extends Controller
{
  public function expEnd(Request $req)
  {
     $rf_id = preg_replace("/\s|-/", "", $req->rf_id);
     $settop_id = $req->settop_id;
     $timestamp = $req->timestamp;
     $total_score = $req->total_score;
     $result = $req->result;

     $item1 = $req->item1;
     $score1 = $req->score1;
     $item2 = $req->item2;
     $score2 = $req->score2;
     $item3 = $req->item3;
     $score3 = $req->score3;
     $item4 = $req->item4;
     $score4 = $req->score4;
     $item5 = $req->item5;
     $score5 = $req->score5;
     $item6 = $req->item6;
     $score6 = $req->score6;
     $item7 = $req->item7;
     $score7 = $req->score7;
     $item8 = $req->item8;
     $score8 = $req->score8;
     $item9 = $req->item9;
     $score9 = $req->score9;
     $item10 = $req->item10;
     $score10 = $req->score10;

     $score_arr = [];

     for($i=1;$i<11;$i++){
       $idxI = 'item'. $i;
       $idxS = 'score'. $i;
       if(isset($req->$idxI)){
         $score_arr[$req->$idxI] = $req->$idxS;
       }
     }

     //log store
     $lgc_log = new LgcLog;
     $lgc_log->rf_id = $rf_id;
     $lgc_log->settop_id = $settop_id;
     $lgc_log->timestamp = $timestamp;
     $lgc_log->total_score = $total_score;
     $lgc_log->result = $result;

     $lgc_log->item1 = $item1;
     $lgc_log->score1 = $score1;
     $lgc_log->item2 = $item2;
     $lgc_log->score2 = $score2;
     $lgc_log->item3 = $item3;
     $lgc_log->score3 = $score3;
     $lgc_log->item4 = $item4;
     $lgc_log->score4 = $score4;
     $lgc_log->item5 = $item5;
     $lgc_log->score5 = $score5;
     $lgc_log->item6 = $item6;
     $lgc_log->score6 = $score6;
     $lgc_log->item7 = $item7;
     $lgc_log->score7 = $score7;
     $lgc_log->item8 = $item8;
     $lgc_log->score8 = $score8;
     $lgc_log->item9 = $item9;
     $lgc_log->score9 = $score10;
     $lgc_log->item10 = $item10;
     $lgc_log->score10 = $score10;


     $lgc_log->temp0 = request()->ip();

     $lgc_log->origin = 'exp_end';
     $lgc_log->save();

     if( isset($rf_id) && isset($settop_id) && isset($result))
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

        ClassConfig::where('class_name','=',$_config->class_name)
                    ->where('class_part','=',$rf_id)
                    ->update(['current_user_id' => ''
                            , 'current_user_name' => '']);

          if($score_len > 0){
            $_score = Score::select()
                             ->where('student_idx','=',$_student->id)
                             ->where('class_name','=',$_config->class_name)
                             ->delete();
           }

           foreach ($score_arr as $key => $value) {
             $result_score = new Score;
             $result_score->student_idx = $_student->id;
             $result_score->class_name = $_config->class_name;
             $result_score->class_part = $rf_id;
             $result_score->item = $key;
             $result_score->score = $value;
             // $result_score->pass = (strtolower($result) == "p")? "pass" : "fail";
             if($value < 70)
                $result_score->pass = "fail";
             else
                $result_score->pass = "pass";
             $result_score->status = "2";

             $result_score->save();
           }

           //종료
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

       $score_len = Score::select()
                           ->where('student_idx','=',$_student->id)
                           ->where('class_name','=',$_config->class_name)
                           ->where('class_part','=',$_config->class_part)
                           ->count();

       ClassConfig::where('current_user_id','=',$_student->id)
                  ->update(['current_user_id' => '', 'current_user_name' => '']);

       ClassConfig::where('settop_id','=',$settop_id)
                   ->update(['current_user_id' => $_student->id
                   , 'current_user_name' => $_student->name]);


       if($score_len != 0){
         $_score = Score::select()
                          ->where('student_idx','=',$_student->id)
                          ->where('class_name','=',$_config->class_name)
                          ->delete();
        }

        foreach ($score_arr as $key => $value) {
          $result_score = new Score;
          $result_score->student_idx = $_student->id;
          $result_score->class_name = $_config->class_name;
          $result_score->class_part = $_config->class_part;
          $result_score->item = $key;
          $result_score->score = $value;
          if($value < 70)
             $result_score->pass = "fail";
          else
             $result_score->pass = "pass";
          $result_score->status = "2";

          $result_score->save();
        }

        //종료
        return response()->json([
          'result_code' => '200',
          'name' => $_student->name
        ]);

     } else {
       //error
       return response()->json([
         'result_code' => '404'
       ]);
     }

  }
}
