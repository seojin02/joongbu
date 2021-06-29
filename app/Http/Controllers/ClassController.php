<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClassController extends Controller
{
    // 체험 개설
    public function create(Request $req){
      return view('pages/createClass');
    }

    // 체험 예약
    public function reservationClass(Request $req){
      return view('pages/reservationClass');
    }

    public function room(Request $req){
      return view('pages/roomList');
    }

    // 체험 결과 - 체험 목록
    public function result(Request $req){
      return view('pages/resultClass');
    }

    // 체험 결과 - 개인
    public function user(Request $req){
      return view('pages/resultClassUser');
    }

    // 사용자 체험 예약 - 사용자 - Auth 권한 없음
    public function reservation(Request $req){
      return view('pages/reservation');
    }

}
