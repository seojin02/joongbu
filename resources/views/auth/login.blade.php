@extends('layouts.login')

@section('content')
<body class="az-body">
    <div class="az-signin-wrapper">
      <div class="az-card-signin no-border">
        <div class="text-center">
          <img src="{{ asset('storage/common/image/logo.png') }}" style="width: 200px;">
        </div>

        <div>
          <div>
            <p style="margin-left: 5px; font-size: 1rem;font-weight: 500;">
              LG화학 - 오창 2공장 안전교육장 관리페이지
            </p>
          </div>
          <div class="az-signin-header">

            <form  method="POST" action="{{ route('login') }}" class="login-form" >
              @csrf
              <div class="form-group">
                <label>{{ __('ID') }}</label>
                <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="아이디를 입력해주세요" required autofocus>

              </div>
              <!-- form-group -->
              <div class="form-group">
                <label>{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="비밀번호를 입력해주세요" name="password" required autocomplete="current-password">
              </div>
              <label class="ckbox">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <span>{{ __('로그인 상태 유지') }}</span>
              </label>
              <!-- form-group -->
              <button class="btn btn-az-primary btn-block bg-main">{{ __('로그인') }}</button>
            </form>
          </div>
          <!-- <div class="az-signin-footer mt-2">
            <p>
              * 계정 정보는 담당자()에게 문의해주세요
            </p>
          </div> -->
        </div>
      </div>

    <!-- modals -->
    <div id="id-modal" class="modal">
      <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 300px;">
        <div class="modal-content tx-size-sm">
          <div class="modal-body tx-center pd-y-20 ">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <h4 class="tx-danger mg-b-20"></h4>
            <p class="mg-b-20 mg-x-20">
              아이디 또는 비밀번호를 <br> 잘못 입력하셨습니다.
            </p>
            <button type="button" class="btn btn-danger pd-x-25" data-dismiss="modal" aria-label="Close">
              닫기
            </button>
          </div>
          <!-- modal-body -->
        </div>
        <!-- modal-content -->
      </div>
      <!-- modal-dialog -->
    </div>
    <!-- modal -->

    <!-- modals -->
    <div id="password-modal" class="modal">
      <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 300px;">
        <div class="modal-content tx-size-sm">
          <div class="modal-body tx-center pd-y-20 ">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <!-- <i
              class="icon icon ion-ios-close-circle-outline tx-100 tx-danger lh-1 mg-t-20 d-inline-block"
            ></i> -->
            <h4 class="tx-danger mg-b-20"></h4>
            <p class="mg-b-20 mg-x-20">
              아이디 또는 비밀번호를 <br> 잘못 입력하셨습니다.
            </p>
            <button type="button" class="btn btn-danger pd-x-25" data-dismiss="modal" aria-label="Close">
              닫기
            </button>
          </div>
          <!-- modal-body -->
        </div>
        <!-- modal-content -->
      </div>
      <!-- modal-dialog -->
    </div>
    <!-- modal -->

    <script>

      @if($errors->has('email'))
          $("#id-modal").modal("show");
      @endif

      @if($errors->has('password'))
          $("#password-modal").modal("show");
      @endif
    </script>

@endsection
