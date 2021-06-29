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

<link rel="stylesheet" href="{{asset('css/pages/createClass.css')}}?v={{env('APP_VERSION')}}">
@endsection

@section('importJS')
<!-- tui calendar -->
<script type="text/javascript" src="{{ asset('lib/tui-calendar/dist/tui-calendar.min.js')}}"></script>
<!-- tui calendar -->
<script type="text/javascript" src="{{ asset('lib/tui-calendar/examples/js/data/calendars.js')}}"></script>

<script type="text/javascript" src="{{asset('js/pages/createClass.js')}}?v={{env('APP_VERSION')}}"></script>
@endsection

@section('menu')
  @include('includes.menu',['current' => 'createClass'])
@endsection

@section('content')
<div  class="az-content az-content-dashboard-two">
  <!-- az-header -->
  <div class="az-content-header d-md-flex">
    <div>
      <h2 class="az-content-title tx-24 mg-b-5 mg-b-lg-8 ml-3">
        체험 개설
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
              <h5 class="mb-0">STEP 1. 날짜 선택</h5>
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
              <button onclick="scheduleAllSettingPopup();" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-button--accent betch-setting">
                일괄 개설
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
              <h5 class="mb-0">STEP 2. 세부항목 입력</h5>
            </div>
          </div>
          <div class="card-body chart-wrapper">
            <!-- 체험명 -->
            <div class="">
              <div class="d-inline-block">
                <p style="font-weight: bold;font-size: 17px;">체험명 : </p>
              </div>
              <div class="d-inline-block">
                <!-- Simple Textfield -->
                <form action="#">
                  <div class="mdl-textfield mdl-js-textfield">
                    <input class="mdl-textfield__input" type="text" id="title" name="title">
                    <label class="mdl-textfield__label" for="title">체험명을 입력해주세요.</label>
                  </div>
                </form>
              </div>
            </div>
            <!-- 날짜  -->
            <div class="">
              <div class="d-inline-block">
                <p style="font-weight: bold;font-size: 17px;">날짜 : </p>
              </div>
              <div class="d-inline-block">
                <!-- Simple Textfield -->
                <form action="#">
                  <div id="classDateWrap" class="mdl-textfield mdl-js-textfield">
                    <input class="mdl-textfield__input" readonly type="text" id="ClassDate">
                    <label class="mdl-textfield__label" for="ClassDate"></label>
                  </div>
                </form>
              </div>
            </div>

            <!-- 시간  -->
            <div class="">
              <div class="d-inline-block">
                <p style="font-weight: bold;font-size: 17px;">시간 : </p>
              </div>
              <div class="d-inline-block w-20 mr-5">
                <!-- Simple Textfield -->
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <select class="mdl-textfield__input" id="startTime" name="startTime">
                      <option></option>
                      <option value="00">00:00</option>
                      <option value="01">01:00</option>
                      <option value="02">02:00</option>
                      <option value="03">03:00</option>
                      <option value="04">04:00</option>
                      <option value="05">05:00</option>
                      <option value="06">06:00</option>
                      <option value="07">07:00</option>
                      <option value="08">08:00</option>
                      <option value="09">09:00</option>
                      <option value="10">10:00</option>
                      <option value="11">11:00</option>
                      <option value="12">12:00</option>
                      <option value="13">13:00</option>
                      <option value="14">14:00</option>
                      <option value="15">15:00</option>
                      <option value="16">16:00</option>
                      <option value="17">17:00</option>
                      <option value="18">18:00</option>
                      <option value="19">19:00</option>
                      <option value="20">20:00</option>
                      <option value="21">21:00</option>
                      <option value="22">22:00</option>
                      <option value="23">23:00</option>
                    </select>
                    <label class="mdl-textfield__label" for="startTime" >시작시간</label>
                </div>
              </div>
              <p class="d-inline-block mr-5"> ~ </p>
              <div class="d-inline-block w-20 mr-5">
                <!-- Simple Textfield -->
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <select class="mdl-textfield__input" id="endTime" name="endTime">
                      <option></option>
                      <option value="00">00:00</option>
                      <option value="01">01:00</option>
                      <option value="02">02:00</option>
                      <option value="03">03:00</option>
                      <option value="04">04:00</option>
                      <option value="05">05:00</option>
                      <option value="06">06:00</option>
                      <option value="07">07:00</option>
                      <option value="08">08:00</option>
                      <option value="09">09:00</option>
                      <option value="10">10:00</option>
                      <option value="11">11:00</option>
                      <option value="12">12:00</option>
                      <option value="13">13:00</option>
                      <option value="14">14:00</option>
                      <option value="15">15:00</option>
                      <option value="16">16:00</option>
                      <option value="17">17:00</option>
                      <option value="18">18:00</option>
                      <option value="19">19:00</option>
                      <option value="20">20:00</option>
                      <option value="21">21:00</option>
                      <option value="22">22:00</option>
                      <option value="23">23:00</option>
                    </select>
                    <label class="mdl-textfield__label" for="endTime">종료시간</label>
                </div>
              </div>
            </div>

            <!-- 인원수  -->
            <div class="">
              <div class="d-inline-block">
                <p style="font-weight: bold;font-size: 17px;">인원 수 : </p>
              </div>
              <div class="d-inline-block w-20 mr-5">
                <!-- Simple Textfield -->
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <select class="mdl-textfield__input" id="minPerson" name="minPerson">
                      <option></option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                    </select>
                    <label class="mdl-textfield__label" for="minPerson">최소인원</label>
                </div>
              </div>
              <p class="d-inline-block mr-5"> ~ </p>
              <div class="d-inline-block w-20 mr-5">
                <!-- Simple Textfield -->
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <select class="mdl-textfield__input" id="maxPerson" name="maxPerson">
                      <option></option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                    </select>
                    <label class="mdl-textfield__label" for="maxPerson">최대인원</label>
                </div>
              </div>
            </div>

            <!-- 취소, 저장  -->
            <div class="text-center">
              <div class="d-inline-block mr-3">
                <button onclick="javascript:window.location.reload();" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
                  취소
                </button>
              </div>


              <div class="d-inline-block">
                <button onclick="scheduleSave();" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-button--accent">
                  저장
                </button>
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
