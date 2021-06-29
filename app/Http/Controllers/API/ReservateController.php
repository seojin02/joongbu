<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

// Model
use App\Model\ClassDetail;
use App\Model\ExperienceClass;
use App\Model\Student;

class ReservateController extends Controller
{
  public function index(Request $req)
  {
    $id = $req->id;
    $select_flag = $req->selectFlag;

    $_class = ExperienceClass::select('id','start_date','start_time','end_time','memo')
                              ->whereRaw('date(`start_date`) >= DATE(now())')
                              ->where('status','=','1')
                              ->orderByRaw('ABS(DATEDIFF(NOW(), DATE(start_date)))')
                              ->limit('1')
                              ->get();

                              // echo count($_class);
    // echo $_class[0]['id'];
    if(count($_class) == 0){
      return response()->json([
        'result' => 'N'
      ]);
    }else{
      $_student = Student::select('name','phone')
                          ->where('class_idx','=',$_class[0]['id'])->get();


      $_manager = ClassDetail::select('dept','manager','phone','email')
                              ->where('class_idx','=',$_class[0]['id'])->get();

      return response()->json([
        'result' => 'Y',
        'data' => $_class,
        'student' => $_student,
        'manager' => $_manager
      ]);
    }
  }

  public function store(Request $request)
  {

  }

  public function edit(Request $request)
  {

  }

  public function destory(Request $request, $id)
  {

  }
}
