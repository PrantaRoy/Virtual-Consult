@extends('theme.one.layout.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <form class="contact-form" action="{{ route('user.register') }}" method="post" onsubmit="return submitUserForm();">
                    @csrf
                    <div class="row">

                        <div class="col-xl-6 col-lg-6">
                            <div class="form-group">
                                <label for="InputFirstname">@lang('First Name')<span class="requred">*</span></label>
                                <input type="text" class="form-control" id="InputFirstname" name="firstname" value="{{old('firstname')}}" placeholder="@lang('Enter Your First Name')"
                                       required>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6">
                            <div class="form-group">
                                <label for="InputLastname">@lang('Last Name')<span class="requred">*</span></label>
                                <input type="text" class="form-control" id="InputLastname" name="lastname" value="{{old('lastname')}}" placeholder="@lang('Enter Your Last Name')"
                                       required>
                            </div>
                        </div>

                        <div class="col-xl-12 col-lg-12">
                            <div class="form-group">
                                <label for="InputMail">@lang('E-mail')<span class="requred">*</span></label>
                                <input type="email" class="form-control" id="InputMail"  name="email"  value="{{old('email')}}"  placeholder="@lang('Enter Your E-mail')"
                                       required>
                            </div>
                        </div>

                        <input type="hidden" id="track" name="country_code" >

                        <div class="col-xl-12 col-lg-12">
                            <div class="form-group">
                                <label for="phone">@lang('Mobile Number')<span class="requred">*</span></label>
                                <input type="tel"  class="form-control pranto-control" id="mobile"  name="mobile"  value="{{old('phone')}}"  required>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12">
                            <div class="form-group">
                                <label for="InputMoe">@lang('Country')<span class="requred">*</span></label>
                                <select class="form-control" name="country" required>
                                    @include('partials.country')
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12">
                            <div class="form-group">
                                <label for="InputUsername">@lang('User Name')<span class="requred">*</span></label>
                                <input type="text" class="form-control" id="InputUsername" name="username" value="{{old('username')}}" placeholder="@lang('Enter Your Username')"
                                       required>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12">
                            <div class="form-group">
                                <label for="InputPassword">@lang('Password')<span class="requred">*</span></label>
                                <input type="password" class="form-control" id="InputPassword" name="password" placeholder="@lang('Enter Your Password')"
                                       required>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12">
                            <div class="form-group">
                                <label for="InputRetypepassword">@lang('Re-type Password')<span class="requred">*</span></label>
                                <input type="password" class="form-control" name="password_confirmation" id="InputRetypepassword" placeholder="@lang('Re-type Password')"
                                       required>
                            </div>
                        </div>




                        <div class="col-md-12">
                            @php echo recaptcha() @endphp
                        </div>



                    </div>
                    @include('partials.custom-captcha')

                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group mb-0 checkbox">
                                <div class="form-check pl-0">
                                    <input class="form-check-input" type="checkbox" required id="gridCheck1">
                                    <label class="form-check-label" for="gridCheck1">
                                        @lang('I agree the terms & conditions')
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="row mt-4">
                        <div class="col-xl-6 col-lg-6">
                            <button type="submit" class="btn btn-success">@lang('Submit Now')</button>
                        </div>
                    </div>
                </form>
                <a href="">Forget Password</a>
            </div>
        </div>
    </div>
@endsection

@push('style')

@endpush

@push('script')
    <script>


        function submitUserForm() {
            var response = grecaptcha.getResponse();
            if(response.length == 0) {
                document.getElementById('g-recaptcha-error').innerHTML = '<span style="color:red;">Captcha field is required.</span>';
                return false;
            }
            return true;
        }

        function verifyCaptcha() {
            document.getElementById('g-recaptcha-error').innerHTML = '';
        }


        $('select[name=country]').val("{{ old('country') }}");
    </script>
@endpush
