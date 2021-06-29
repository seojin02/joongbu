{{-- 레이아웃 설정 --}}
@extends('layouts.default')

@section('title')
LG화학 - 오창2공장 안전교육장 예약
@endsection

@section('importCSS')
<link rel="stylesheet" href="{{asset('css/pages/addLearn.css')}}?v={{env('APP_VERSION')}}">
@endsection

@section('importJS')
<script type="text/javascript" src="{{asset('js/pages/addLearn.js')}}?v={{env('APP_VERSION')}}"></script>
@endsection

@section('menu')
  @include('includes.menu',['current' => 'reservationClass'])
@endsection

@section('content')
<div class="middle-div-p">
  <div class="middle-div-c az-content-title tx-30" style="height: 80px;background-color: #C1BDBD;">
    보충 학습을 수행해 주세요!<br>
    모든 영상을 시청하셔야 학습이 완료됩니다.
  </div>
</div>

<div  class="az-content az-content-dashboard-two">
  <!-- az-content-body -->
  <div class="az-content-body">

    <!--보충 학습 목록-->
    <div class="row">
      <div class="col-12">

        <h2 class="az-content-title tx-20 mg-b-5 mg-b-lg-8">
          보충학습 목록
        </h2>

        <div class="table-responsive">
          <table class="table table-bordered text-center">
            <colgroup>
              <col width="30%"/>
              <col width="50%"/>
              <col width="20%"/>
            </colgroup>

            <thead class="text-uppercase" style="background-color: #F1F1F1;">
              <tr>
                <td scope="col" colspan="2" style="text-align:center;">구분</td>
                <td scope="col" colspan="1" style="text-align:center;">학습</td>
              </tr>
            </thead>

            <tbody id="userAddList">
            </tbody>
          </table>
        </div>

        <div style="text-align:right;color:red" class="az-content-title tx-18 mg-b-5 mg-b-lg-8">
          진도율 33%
        </div>

      </div>
    </div>
    <!--보충 학습 목록-->

    <!--보충학습 영상 -->
    <div class="row">
      <div class="col-12">

        <h2 class="az-content-title tx-20 mg-b-5 mg-b-lg-8">
          보충학습 영상
        </h2>

        <div class="" style="text-align:center;border : 1px solid black;">
          <video poster="logo.png" width="100%" height="60%" controls="controls">
              <source src="SampleVideo.mp4" type="video/mp4" />
          </video>
        </div>

        <div style="margin-top:30px;" class="az-content-title tx-20 mg-b-5 mg-b-lg-8">
        *  영상은 중간에 스킵하실 수 없으며, 모든 영상을 끝까지 시청하셔야 보충 학습이 완료됩니다.<br><br>
        *  보충 학습 목록이 본인의 학습결과와 일치하지 않는다면 담당자에서 문의하세요
        </div>

        <div style="margin-top:30px;">

        </div>

      </div>
    </div>

  </div>
</div>

</div>
@endsection
