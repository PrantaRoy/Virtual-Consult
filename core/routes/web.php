<?php

Route::get('clear', function () {
    \Artisan::call('view:clear');
    \Artisan::call('config:clear');
    \Artisan::call('route:clear');
    \Artisan::call('cache:clear');
});

Route::get('/', 'PagesController@home')->name('home');



Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {
    Route::namespace('Auth')->group(function () {
        Route::get('/', 'LoginController@showLoginForm')->name('login');
        Route::post('/', 'LoginController@login')->name('login');
        Route::get('logout', 'LoginController@logout')->name('logout');


        // Admin Password Reset
        Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.reset');
        Route::post('password/reset', 'ForgotPasswordController@sendResetLinkEmail');
        Route::post('password/verify-code', 'ForgotPasswordController@verifyCode')->name('password.verify-code');
        Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.change-link');
        Route::post('password/reset/change', 'ResetPasswordController@reset')->name('password.change');
    });

    Route::middleware('admin')->group(function () {
        Route::get('dashboard', 'AdminController@dashboard')->name('dashboard');
        Route::get('profile', 'AdminController@profile')->name('profile');
        Route::get('account/info', 'AdminController@password')->name('password');
        Route::post('profile', 'AdminController@profileUpdate')->name('profile.update');
        Route::post('password', 'AdminController@passwordUpdate')->name('password.update');

        //Setting

        Route::get('setting', 'SettingController@index')->name('setting');
        Route::get('setting/general', 'SettingController@general')->name('setting.general');
        Route::post('setting/general', 'SettingController@generalSave')->name('setting.generalSave');
        Route::get('setting/seo', 'SettingController@seo')->name('setting.seo');
        Route::post('setting/seo', 'SettingController@seoUpdate')->name('setting.seoUpdate');
        Route::get('setting/email', 'SettingController@email')->name('setting.email');
        Route::post('setting/emailTemp', 'SettingController@emailTemplateUpdate')->name('setting.emailTemplateUpdate');
        Route::get('setting/system', 'SettingController@system')->name('setting.system');
        Route::post('setting/systemUpdate', 'SettingController@systemUpdate')->name('setting.systemUpdate');
        Route::get('setting/security', 'SettingController@security')->name('setting.security');
        Route::get('setting/automation', 'SettingController@automation')->name('setting.automation');



    });
});


Route::name('user.')->prefix('user')->group(function () {


    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\LoginController@login');
    Route::get('logout', 'Auth\LoginController@logoutGet')->name('logout');

    Route::get('/login/{provider}', 'Auth\LoginController@redirectToProvider')->name('social.login');
    Route::get('/login/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('social.login.callback');


    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/verify-code', 'Auth\ForgotPasswordController@verifyCode')->name('password.verify-code');

    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register')->middleware('regStatus');


    Route::middleware('auth')->group(function () {
        Route::get('authorization', 'AuthorizationController@authorizeForm')->name('authorization');
        Route::get('resend-verify', 'AuthorizationController@sendVerifyCode')->name('send_verify_code');
        Route::post('verify-email', 'AuthorizationController@emailVerification')->name('verify_email');
        Route::post('verify-sms', 'AuthorizationController@smsVerification')->name('verify_sms');
        Route::post('verify-g2fa', 'AuthorizationController@g2faVerification')->name('go2fa.verify');


        Route::middleware('ckstatus')->group(function () {
            Route::get('dashboard', 'UserController@home')->name('home');


        });
    });
});