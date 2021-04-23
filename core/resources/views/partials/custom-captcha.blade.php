
@if(\App\Plugin::where('act', 'custom-captcha')->where('status', 1)->first())
    <div class="row">
        <div class="col-md-3">
            @php echo  getCustomCaptcha() @endphp
        </div>
        <div class="col-md-3">
            <input type="text" name="captcha" placeholder=" Enter Code">
        </div>
    </div>
@endif
