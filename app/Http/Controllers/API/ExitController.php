<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\ExperienceClass;
use App\Model\ClassDetail;
use App\Model\Student;
use App\Model\ClassConfig;
use App\Model\LgcLog;

use DB;

// resource
use App\Http\Resources\commonResource;
use App\Http\Resources\commonCollection;
use App\Http\Resources\scoreCollection;

class ExitController extends Controller
{
  public function exit(Request $req)
  {

     $rf_id = preg_replace("/\s|-/", "", $req->rf_id);
     $settop_id = $req->settop_id;
     $timestamp = $req->timestamp;

     //log store
     $lgc_log = new LgcLog;
     $lgc_log->rf_id = $rf_id;
     $lgc_log->settop_id = $settop_id;
     $lgc_log->timestamp = $timestamp;

     $lgc_log->temp0 = request()->ip();
     $lgc_log->origin = 'exit';
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

     if( isset($rf_id) && isset($settop_id))
     {
         $_student = Student::select()
                            ->where('rf_id','=',$rf_id)
                            ->first();

         $_config = ClassConfig::select()
                               ->where('settop_id','=',$settop_id)
                               ->first();

         Classconfig::where('current_user_id','=',$_student->id)
                    ->update(['current_user_id' => '', 'current_user_name' => '']);

         ClassConfig::where('settop_id','=',$settop_id)
                     ->update(['current_user_id' => $_config->current_user_id.$_student->id.'|'
                     , 'current_user_name' => $_config->current_user_name.$_student->name.'|']);

         // 체험 종료
         $_student = Student::where('rf_id','=',$rf_id)
                             ->where('status','=','1')
                             ->update(['status' => '2'
                                     , 'out_time' => DB::Raw("now()")
                                     , 'current_stage' =>  $settop_id
                                      ]);

        if($_student == "1"){

          $data = Student::selectRaw("lgc_class_detail.dept AS `dept`, lgc_class_student_detail.name AS `name`
                                      , lgc_class_student_score.class_name AS `class_name`, lgc_class_student_score.pass AS `pass`
                                      , lgc_class_student_score.item AS `title`, lgc_class_student_score.score AS `score`
                                      , lgc_class_student_detail.id AS `student_id`")
                          ->leftJoin("lgc_class_student_score", "lgc_class_student_detail.id", "=", "lgc_class_student_score.student_idx")
                          ->leftJoin("lgc_class_detail", "lgc_class_student_detail.class_idx", "=", "lgc_class_detail.class_idx")
                          ->where("lgc_class_student_detail.rf_id","=",$rf_id)
                          // ->where("lgc_class_student_detail.id","=","25")
                          ->where("lgc_class_student_detail.status","=","2")
                          ->get();

          //success
          // echo 'dsfsdf';
          $data = new scoreCollection($data);
          $data = json_encode($data);
          $data = json_decode($data);

          print_r($data);

          $str = '';
          $buttonStr = '';
          $checkSwitch = 0;

          $keyArr = (array_keys(get_object_vars($data)));
          $keyArr = array_values(array_diff($keyArr,array('result_code','result_score','total_score','student_id','data','dept','name')));

          $title = '<strong>'.$data->dept.' '.$data->name.'님!</strong>';
          $score = '<strong>총점: <font color="orange">'.$data->result_score.'</font>/<font color="green">'.$data->total_score.'</font>점</strong>';

          for($i=0; $i<count($keyArr); $i++){
            if($data->{$keyArr[$i]}->result == "pass"){
              $buttonStr = '<button type="button" class="btn btn-rounded btn-success"><strong>PASS</strong></button>';
            }else if($data->{$keyArr[$i]}->result == "fail"){
              $buttonStr = '<button type="button" class="btn btn-rounded btn-warning"><strong>Fail</strong></button>';
              $checkSwitch = 1;
            }

            $str .='<tr>'
                 .'<td scope="col" rowspan="'.count($data->{$keyArr[$i]}->detail).'" style="vertical-align: middle;">'.$keyArr[$i].'</td>'
                 .'<td style="vertical-align: middle;">'.$data->{$keyArr[$i]}->detail[0]->title.'</td>'
                 .'<td style="vertical-align: middle;">'.$data->{$keyArr[$i]}->detail[0]->score.'</td>'
                 .'<td scope="col" rowspan="'.count($data->{$keyArr[$i]}->detail).'" style="vertical-align: middle;">'.$data->{$keyArr[$i]}->exchange_score.'</td>'
                 .'<td scope="col" rowspan="'.count($data->{$keyArr[$i]}->detail).'" style="vertical-align: middle;">'.$buttonStr.'</td>'
                 .'</tr>';

            for($j=1; $j<count($data->{$keyArr[$i]}->detail); $j++){
              $str .='<tr>'
                   .'<td style="vertical-align: middle;">'.$data->{$keyArr[$i]}->detail[$j]->title.'</td>'
                   .'<td style="vertical-align: middle;">'.$data->{$keyArr[$i]}->detail[$j]->score.'</td>'
                   .'</tr>';
            }
          }

          return response()->json([
            'result_code' => '200',
            'contents' => $str,
            'title' => $title,
            'score' => $score,
            'checkSwitch' => $checkSwitch,
            'student_id' => $data->student_id
          ]);


     }else{
          //error
          return response()->json([
            'result_code' => '404'
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
