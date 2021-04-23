@extends('theme.one.layout.master')

@section('content')
    <div class="row">
        <div class="container">
            <div class="col-md-12">
                <h4>{{ $page_title }}</h4>
            </div>
            <div class="col-md-12">
                <form action="{{ route('user.password.verify-code') }}" method="POST" class="login-form">
                    @csrf
                    <input type="hidden" name="email" value="{{ $email }}">
                    <div class="login-inner-block">
                        <div class="frm-grp">
                            <i class="fa fa-key"></i>
                            <input type="text" name="code" id="pincode-input" class="magic-label">
                            <label>Verification Code</label>
                        </div>
                    </div>
                
                    <div class="btn-area">
                        <button type="submit" class="submit-btn">Verify Code</button>
                        <a href="{{ route('user.password.request') }}" class="forget-pass">Try to send again</a>
                
                    </div>
                </form>
            </div>
        </div>
    </div>
    
@endsection
@push('style-lib')
<link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap-pincode-input.css') }}"/>
<script src="{{ asset('assets/admin/js/bootstrap-pincode-input.js') }}"></script>
@endpush
@push('js')
<script>
$('#pincode-input').pincodeInput({
    inputs:6,
        placeholder:"- - - - - -",
        hidedigits:false
});
</script>   
@endpush