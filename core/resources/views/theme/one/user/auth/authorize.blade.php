@extends(activeTheme().'layout.master')
@section('style')
    <style>

        .pincode-input-container{
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .pincode-input-container .pincode-input-text {
            /*margin-left: 5px;*/
            text-align: center;
            font-weight: 600;
            font-size: 40px;
            border: 2px striped #{{$general->bclr}};
            color: #{{$general->bclr}};
        }
        .login-area .login-form .frm-grp input {
            padding:inherit;
        }
        .pincode-input-text, .form-control.pincode-input-text {
            width: 46px;
            height: 46px !important;
        }
    </style>
@stop

@section('content')
    @if(!$user->status)
        <section class=" top-section-padding pb-70">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card shadow-inset  border-0">
                            <div class="card-body">

                                <h3 class="title  text-center text-danger">@lang($page_title) </h3>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    @elseif(!$user->ev)
        <div class="container py-5">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <form method="POST" action="{{route('user.verify_email')}}" class="mb-4">
                        @csrf
                        <h2 class="text-center pb-4 text-uppercase"> @lang($page_title)</h2>
                        <div class="row justify-content-center">
                            <div class="col-md-6 text-center">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" readonly value="{{auth()->user()->email}}">
                                </div>
                                <div class="form-group">
                                    <input  name="email_verified_code" id="pincode-input" placeholder="@lang('Code')" class="form-control">

                                    @if ($errors->has('email_verified_code'))
                                        <small class="text-danger">{{ $errors->first('email_verified_code') }}</small>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-lg">@lang('Submit')</button>
                                </div>
                                <div class="form-group">
                                    @lang('Please check including your Junk/Spam Folder. if not found, you can ') <a href="{{route('user.send_verify_code')}}?type=email"> @lang('Resend code Again')</a>
                                    @if ($errors->has('resend'))
                                        <br/>
                                        <small class="text-danger">{{ $errors->first('resend') }}</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @elseif(!$user->sv)
        <div class="container py-5">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <form method="POST" action="{{route('user.verify_sms')}}" class="mb-4">
                        @csrf
                        <h2 class="text-center  pb-4 text-uppercase"> @lang($page_title)</h2>
                        <div class="row justify-content-center">
                            <div class="col-md-6 text-center">
                                <div class="form-group">
                                    <input type="text" name="mobile" class="form-control" readonly value="{{auth()->user()->mobile}}">
                                </div>
                                <div class="form-group">
                                    <input  name="sms_verified_code" id="pincode-input" placeholder="@lang('Code')" class="form-control">

                                    @if ($errors->has('sms_verified_code'))
                                        <small class="text-danger">{{ $errors->first('sms_verified_code') }}</small>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-lg">@lang('Submit')</button>
                                </div>
                                <div class="form-group">
                                    @lang('No code on your phone Yet ? ') <a href="{{route('user.send_verify_code')}}?type=phone"> @lang('Resend code Again')</a>
                                    @if ($errors->has('resend'))
                                        <br/>
                                        <small class="text-danger">{{ $errors->first('resend') }}</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @elseif(!$user->tv)
        <div class="container py-5">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <form class="contact-form" method="POST" action="{{route('user.go2fa.verify') }}">
                        @csrf
                        <h2 class="text-center  pb-4 text-uppercase"> @lang('2FA VERIFICATION')</h2>

                        <div class="row justify-content-center">
                            <div class="form-group ">
                                <strong> @lang('Current Time') : {{\Carbon\Carbon::now()}}</strong>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-md-6 text-center">

                                <div class="form-group">

                                    <p class="mb-3"> @lang("Google Authenticator Code") </p>

                                    <input  name="code" id="pincode-input" placeholder="@lang('Enter Google Authenticator Code')" class="form-control">
                                    @if ($errors->has('code'))
                                        <small class="text-danger">{{ $errors->first('code') }}</small>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-lg">@lang('Submit')</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    @endif
@endsection

@push('style')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap-pincode-input.css') }}"/>
@endpush

@push('script')
    <script src="{{ asset('assets/admin/js/bootstrap-pincode-input.js') }}"></script>
    <script>
        $('#pincode-input').pincodeInput({
            inputs:6,
            placeholder:"- - - - - -",
            hidedigits:false
        });
    </script>
@endpush
