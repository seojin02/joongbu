<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

// Model
use App\Model\ExperienceClass;
use App\Model\ClassDetail;
use App\Model\Student;


class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $id = $req->id;
        $select_flag = $req->selectFlag;

        $_class = ExperienceClass::where('id','=',$id)
                                  ->first();


        if($_class->status != 0){
          if($select_flag == 'Y'){

            $_class_data = ClassDetail::select('lgc_class_detail.dept', 'lgc_class_detail.manager', 'lgc_class_detail.phone as manager_phone', 'lgc_class_detail.email'
                                              , 'lgc_class_student_detail.name', 'lgc_class_student_detail.phone')
                                        ->leftJoin('lgc_class_student_detail','lgc_class_student_detail.class_idx', '=' , 'lgc_class_detail.class_idx')
                                        ->where('lgc_class_student_detail.class_idx', '=', $id)
                                        ->get();

            return response()->json([
                  'result' => 'N'
              ,   'Msg' => '해당 건은 예약이 불가합니다. 다른 예약건을 선택 해주세요.'
              ,   'class_data' => $_class
              ,   'data' => $_class_data
            ]);

          }else{
            return response()->json([
              'result' => 'N'
              ,   'Msg' => '해당 건은 예약이 불가합니다. 다른 예약건을 선택 해주세요.'
            ]);
          }
        }else{
          return response()->json([
                        'result' => 'Y'
                    ,   'data' => $_class
          ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $ClassId = $request->ClassId;
        $Dept = $request->Dept;
        $Manager = $request->Manager;
        $ManagerPhone = $request->ManagerPhone;
        $Email = $request->Email;
        $UserName = [];
        for ($i=0; $i < count($request->input("UserName")); $i++) {
          array_push($UserName, $request->input("UserName")[$i]);
        }
        $UserPhone = [];
        for ($i=0; $i < count($request->input("UserPhone")); $i++) {
          array_push($UserPhone, $request->input("UserPhone")[$i]);
        }
        $Memo = $request->Memo;

        $_class = ExperienceClass::where('id','=',$ClassId)
                                  ->first();

        if($_class->status != 0){
          return response()->json([
                        'result' => 'N'
                    ,   'Msg' => '해당 건은 예약이 불가합니다. 다른 예약건을 선택 해주세요.'
          ]);
        }

        $_class = ExperienceClass::where('id','=',$ClassId)
                                  ->update([
                                        'status' => '1'
                                      , 'memo' => $Memo
                                    ]);


        $_class_detail = new ClassDetail;
        $_class_detail->class_idx = $ClassId;
        $_class_detail->dept = $Dept;
        $_class_detail->manager = $Manager;
        $_class_detail->phone = $ManagerPhone;
        $_class_detail->email = $Email;
        $_class_detail->person_cnt = count($request->input("UserName"));
        $_class_detail->memo = '';
        $_class_detail->status = '';
        $_class_detail->save();

        for ($i=0; $i < count($UserName); $i++) {
          $_insert_user = new Student;
          $_insert_user->class_idx = $ClassId;
          $_insert_user->name = $UserName[$i];
          $_insert_user->phone = $UserPhone[$i];
          $_insert_user->rf_id = '';
          $_insert_user->current_stage = '';
          $_insert_user->pass = '';
          $_insert_user->status = '';
          $_insert_user->save();
        }

        return response()->json([
                      'result' => 'Y'
                  ,   'Msg' => '예약이 정상적으로 접수되었습니다.'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $ClassId = $id;

        $title = $request->title;
        $class_date = $request->class_date;
        $start_time = $request->start_time;
        $end_time = $request->end_time;
        $min_person = $request->min_person;
        $max_person = $request->max_person;

        $_get_status = ExperienceClass::where("id", "=" , $ClassId)
                                        ->get();

        try{
          $_update_row = ExperienceClass::where("id","=",$ClassId)
                                        ->update(['title' => $title, 'start_date' => $class_date,
                                        'end_date' => $class_date, 'start_time' => $start_time,
                                        'end_time' => $end_time, 'min_person' => $min_person, 'max_person' => $max_person]);

          // return $_get_status;
          return response()->json([
                        'result' => 'Y'
                    ,   'Msg' => '예약건이 정상적으로 처리되었습니다.'
          ]);
        }catch(Exception $e){
          return response()->json([
                        'result' => 'N'
                    ,   'Msg' => '예약 상태 변경 중 오류가 발생하였습니다. 담당자에게 문의바랍니다.'
          ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        $ClassId = $id;

        $status = $request->status;

        if($status == "-1") {
          $status = "0";
          // 승인 취소 건 처리

          ClassDetail::where('class_idx','=',$ClassId)
                      ->delete();

          Student::where('class_idx','=',$ClassId)
                      ->delete();
        }

        $_class = ExperienceClass::where('id','=',$ClassId)
                                  ->update([
                                    'status' => $status
                                  ]);

        if($_class){
          return response()->json([
                        'result' => 'Y'
                    ,   'Msg' => '예약건이 정상적으로 처리되었습니다.'
          ]);
        }else {
          return response()->json([
                        'result' => 'N'
                    ,   'Msg' => '예약 상태 변경 중 오류가 발생하였습니다. 담당자에게 문의바랍니다.'
          ]);
        }

    }
}
