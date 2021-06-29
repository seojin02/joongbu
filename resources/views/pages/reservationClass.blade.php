{{-- 레이아웃 설정 --}}
@extends('layouts.app')

@section('title')
LG화학 - 오창 2공장 안전교육장 관리페이지
@endsection

@section('importCSS')
<!-- tui calendar -->
<link rel="stylesheet" href="{{asset('lib/tui-calendar/dist/tui-calendar.css')}}?v={{env('APP_VERSION')}}">
<link rel="stylesheet" href="{{asset('lib/tui-calendar/examples/css/default.css')}}?v={{env('APP_VERSION')}}">
<link rel="stylesheet" href="{{asset('lib/tui-calendar/examples/css/icons.css')}}?v={{env('APP_VERSION')}}">

<link rel="stylesheet" href="{{asset('css/pages/reservationClass.css')}}?v={{env('APP_VERSION')}}">
@endsection

@section('importJS')
<!-- tui calendar -->
<script type="text/javascript" src="{{ asset('lib/tui-calendar/dist/tui-calendar.min.js')}}"></script>
<!-- tui calendar -->
<script type="text/javascript" src="{{ asset('lib/tui-calendar/examples/js/data/calendars.js')}}"></script>

<script type="text/javascript" src="{{asset('js/pages/reservationClass.js')}}?v={{env('APP_VERSION')}}"></script>
@endsection

@section('menu')
  @include('includes.menu',['current' => 'reservationClass'])
@endsection

@section('content')
<div  class="az-content az-content-dashboard-two">
  <!-- az-header -->
  <div class="az-content-header d-md-flex">
    <div>
      <h2 class="az-content-title tx-24 mg-b-5 mg-b-lg-8 ml-3">
        체험 예약
      </h2>
    </div>
  </div>
  <!-- az-content-body -->
  <div class="az-content-body">
    <div class="row row-sm">
      <div class="col-8">
        <div class="card card-minimal-two">
          <div class="card-header">
            <div class="d-flex align-items-center">
              <h5 class="mb-0">체험 예약 현황</h5>
            </div>

          <!-- card-header-right -->
          </div>
          <div class="card-body chart-wrapper">
            <div class="card-menu-body-wrapper">
              <span id="menu-navi">

                <button type="button" class="btn btn-default btn-sm move-day" data-action="move-prev">
                  <i class="calendar-icon ic-arrow-line-left" data-action="move-prev"></i>
                </button>

                <span id="renderRange" class="render-range" style="cursor:pointer;"></span>

                <button type="button" class="btn btn-default btn-sm move-day" data-action="move-next">
                  <i class="calendar-icon ic-arrow-line-right" data-action="move-next"></i>
                </button>

                <div class="col-12 text-center">
                  <div id="dateWrapper"></div>
                </div>

              </span>
              <button onclick="gotoUnsigned();" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-button--accent betch-setting">
                승인대기 찾기
              </button>
            </div>

             <div id="calendar" style="height: 670px;"></div>
          </div>
        </div>
      </div>
      <div class="col-4">
        <div class="card card-minimal-two">
          <div class="card-header">
            <div class="d-flex align-items-center">
              <h5 class="mb-0">예약 상세 정보</h5>
            </div>
          </div>
          <div class="card-body chart-wrapper">
            <input type="hidden" id="classId" value="" />
            <div class="reservation-table m-3">
              <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp w-100">
                 <tbody>
                   <tr>
                     <td>일자</td>
                     <td id="reservationDate"></td>
                   </tr>
                   <tr>
                     <td>시간</td>
                     <td id="reservationTime"></td>
                   </tr>
                   <tr>
                     <td>예약 부서</td>
                     <td id="reservationDept"></td>
                   </tr>
                   <tr>
                     <td>예약 담당자</td>
                     <td id="reservationManager">
                     </td>
                   </tr>
                   <tr>
                     <td>연락처</td>
                     <td id="managerPhone">
                     </td>
                   </tr>
                   <tr>
                     <td>이메일</td>
                     <td id="email">
                     </td>
                   </tr>
                   <tr>
                     <td>승인 여부</td>
                     <td>
                       <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                         <select id="status" class="mdl-textfield__input">
                           <option value="1">승인 대기</option>
                           <option value="2">승인</option>
                           <option value="-1">승인취소</option>
                         </select>
                       </div>
                     </td>
                   </tr>
                   <tr>
                     <td>참가인원</td>
                     <td id="reservationPerson">
                     </td>
                   </tr>
                   <tr>
                     <td>참가자</td>
                     <td id="reservationDetail" style='height: 145px;overflow: auto;display: list-item;'>
                     </td>
                   </tr>
                   <tr>
                     <td>메모</td>
                     <td id="memo">
                     </td>
                   </tr>
                 </tbody>
               </table>

               <!-- 취소, 저장  -->
               <div class="text-center mt-3">
                 <div class="d-inline-block">
                   <button onclick="expSave();" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-button--accent">
                     저장
                   </button>
                 </div>
               </div>
            </div>
          </div>
          </div>
        </div>
      </div>

      <div class="position-relative" style="margin-left:5px;margin-top:0px;">
        <span class="tui-full-calendar-weekday-schedule-bullet" style="left:auto;top: 8px;background:#69BB2D;margin-left:3px;"></span><span class="ml-3">예약 가능</span>
        <span class="tui-full-calendar-weekday-schedule-bullet" style="left:auto;top: 8px;background:#ffed00;margin-left:3px;"></span><span class="ml-3">승인 대기</span>
        <span class="tui-full-calendar-weekday-schedule-bullet" style="left:auto;top: 8px;background:#ff000a;margin-left:3px;"></span><span class="ml-3">예약 완료</span>
      </div>

    </div>
  </div>
</div>

@endsection
