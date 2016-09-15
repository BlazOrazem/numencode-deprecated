<?php

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

// Login
$loginController = config('login.throttle') ? 'Auth\LoginWithThrottleController' : 'Auth\LoginController';
Route::get('login', $loginController . '@showLoginForm')->name('login');
Route::post('login', $loginController . '@login')->name('login.post');

// Registration
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register')->name('register.post');
Route::get('register/verify/{token}', 'Auth\RegisterController@verifyEmail');

// Socialite
Route::get('social/{provider?}', 'Auth\SocialAuthController@login')->name('login.social');

// Password reset
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.send');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.forget');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.reset');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password');
