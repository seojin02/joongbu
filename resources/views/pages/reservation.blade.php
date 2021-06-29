{{-- 레이아웃 설정 --}}
@extends('layouts.default')

@section('title')
LG화학 - 오창2공장 안전교육장 예약
@endsection

@section('importCSS')
<!-- tui calendar -->
<link rel="stylesheet" href="{{asset('lib/tui-calendar/dist/tui-calendar.css')}}?v={{env('APP_VERSION')}}">
<link rel="stylesheet" href="{{asset('lib/tui-calendar/examples/css/default.css')}}?v={{env('APP_VERSION')}}">
<link rel="stylesheet" href="{{asset('lib/tui-calendar/examples/css/icons.css')}}?v={{env('APP_VERSION')}}">

<link rel="stylesheet" href="{{asset('css/pages/reservation.css')}}?v={{env('APP_VERSION')}}">
@endsection

@section('importJS')
<!-- tui calendar -->
<script type="text/javascript" src="{{ asset('lib/tui-calendar/dist/tui-calendar.min.js')}}"></script>
<!-- tui calendar -->
<script type="text/javascript" src="{{ asset('lib/tui-calendar/examples/js/data/calendars.js')}}"></script>

<script type="text/javascript" src="{{asset('js/pages/reservation.js')}}?v={{env('APP_VERSION')}}"></script>
@endsection

@section('menu')
  @include('includes.menu',['current' => 'reservationClass'])
@endsection

@section('content')
<div  class="az-content az-content-dashboard-two">
  <!-- az-content-body -->
  <div class="az-content-body">
    <div class="row row-sm">
      <div class="col-8">
        <div class="card card-minimal-two">
          <div class="card-header">
            <div class="d-flex align-items-center">
              <h5 class="mb-0">STEP1. 날짜 선택</h5>
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
            </div>

             <div id="calendar" style="height: calc(100vh - 285px);"></div>
          </div>
        </div>
      </div>
      <div class="col-4">
        <!-- Header  -->
        <div class="card card-minimal-two">
          <div class="card-header">
            <div class="d-flex align-items-center">
              <h5 class="mb-0">STEP2. 예약 정보 입력</h5>
            </div>
          </div>
          <!-- Body -->
          <div id="reservationWrapper" class="card-body reservation-box-temp">
             <div class="reservation-info-text">예약정보를 선택해주세요.</div>
             <input type="hidden" id="classId" value="" />
             <div class="reservation-table m-3 d-none">
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
                      <td>
                        <!-- Simple Textfield -->
                        <form action="#">
                          <div class="mdl-textfield mdl-js-textfield">
                            <input class="mdl-textfield__input" type="text" id="reservationDept">
                          </div>
                        </form>
                      </td>
                    </tr>
                    <tr>
                      <td>예약 담당자</td>
                      <td>
                        <!-- Simple Textfield -->
                        <form action="#">
                          <div class="mdl-textfield mdl-js-textfield">
                            <input class="mdl-textfield__input" type="text" id="reservationManager">
                            <label class="mdl-textfield__label" for="sample1"></label>
                          </div>
                        </form>
                      </td>
                    </tr>
                    <tr>
                      <td>연락처</td>
                      <td>
                        <!-- Simple Textfield -->
                        <form action="#">
                          <div class="mdl-textfield mdl-js-textfield" id="managerPhoneForm">
                            <input class="mdl-textfield__input" type="text" id="managerPhone" placeholder="숫자만 입력해 주세요">
                            <label class="mdl-textfield__label" for="sample1"></label>
                          </div>
                        </form>
                      </td>
                    </tr>
                    <tr>
                      <td>이메일</td>
                      <td>
                        <!-- Simple Textfield -->
                        <form action="#">
                          <div class="mdl-textfield mdl-js-textfield" id="emailForm">
                            <input class="mdl-textfield__input" type="text" id="email">
                            <label class="mdl-textfield__label" for="sample1"></label>
                          </div>
                        </form>
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
                      <td>
                        <!-- Simple Textfield -->
                        <form action="#">
                          <div class="mdl-textfield mdl-js-textfield">
                            <input class="mdl-textfield__input" type="text" id="memo">
                            <label class="mdl-textfield__label" for="sample1"></label>
                          </div>
                        </form>
                      </td>
                    </tr>
                  </tbody>
                </table>

                <!-- 취소, 저장  -->
                <div class="text-center mt-3">
                  <div class="d-inline-block mr-3">
                    <button onclick="javascript:window.location.reload();" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
                      예약 취소
                    </button>
                  </div>


                  <div class="d-inline-block">
                    <button onclick="reservation('reservationWrapper');" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-button--accent">
                      예약 신청
                    </button>
                  </div>
                </div>

                <div class="position-absolute" style="bottom:0;">
                  <p>* 예약이 승인 또는 취소되면, 입력하신 예약 담당자 연락처로 안내 메시지가 전송 됩니다. 수신 가능한 연락처를 입력해주세요.</p>
                  <p>* 추후 보충학습 URL이 참가자 연락처로 전송됩니다. 수신 가능한 연락처를 입력해주세요.</p>
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

@endsection
