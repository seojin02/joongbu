{{-- 레이아웃 설정 --}}
@extends('layouts.app')

@section('title')
LG화학 - 오창 2공장 안전교육장 관리페이지
@endsection

@section('importCSS')
<link rel="stylesheet" href="{{asset('css/pages/roomList.css')}}?v={{env('APP_VERSION')}}">
@endsection

@section('importJS')
<script src="/lib/socket.io-client/dist/socket.io.js"></script>
<script type="text/javascript" src="{{asset('js/pages/roomList.js')}}?v={{env('APP_VERSION')}}"></script>
@endsection

@section('menu')
  @include('includes.menu',['current' => 'roomList'])
@endsection

@section('content')
<div class="az-content az-content-dashboard-two">
  <!-- az-header -->
  <div class="az-content-header d-md-flex">
    <div>
      <h2 class="az-content-title tx-24 mg-b-5 mg-b-lg-8 ml-3">
        체험장 현황
      </h2>
    </div>
  </div>
  <!-- az-content-body -->
  <div class="az-content-body">
    <div class="room_wrapper">
      <div class="room-in">
      </div>
      <div class="in">
          <center>입구</center>
          <div id="ST1001"></div>
      </div>
      <div class="air-shower">
            <center>AIR SHOWER</center>
      </div>
      <div class="clean-room">
          <center>크린룸</center>
      </div>
      <div class="vr-room-03">
        <center>VR-03</center>
        <div id="ST2003"></div>
      </div>
      <div class="vr-room-04">
        <center>VR-04</center>
        <div id="ST2004"></div>
      </div>
      <div class="control-room">
        <center>컨트롤 룸</center>
      </div>
      <div class="vr-room-01">
          <center>VR-01</center>
          <div id="ST2001"></div>
      </div>
      <div class="vr-room-02">
          <center>VR-02</center>
          <div id="ST2002"></div>
      </div>
      <div class="wall">
      </div>
      <div class="exit">
          <center>출구</center>
          <div id="ST5001"></div>
      </div>
      <div class="fire-area">
          <center>소화기/소화전</center>
          <div class="row">
            <div id="ST3001" class="mr-4"></div>
            <div id="ST3002"></div>
          </div>
      </div>
      <div class="cpr-room">
        <center>CPR</center>
        <div id="ST4001" class="mb-1"></div>
        <div id="ST4002" class="mb-1"></div>
        <div id="ST4003" class="mb-1"></div>
        <div id="ST4004" class="mb-1"></div>
        <div id="ST4005" class="mb-3"></div>
      </div>

    </div>
  </div>
</div>

<script>
  var socket = io.connect('{{ Request::getHost() }}:6001');

  socket.on('roomList', function (data) {
    roomDraw(data);
  });
</script>
@endsection
