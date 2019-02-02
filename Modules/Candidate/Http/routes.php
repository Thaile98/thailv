<?php

Route::group(['middleware' => 'web', 'prefix' => 'candidate', 'namespace' => 'Modules\Candidate\Http\Controllers'], function()
{
    Route::post('/register', 'CandidateController@postRegister')->name('post.candidate.register');
    Route::post('/login', 'CandidateController@postLogin')->name('post.candidate.login');
    Route::get('/logout', 'CandidateController@getLogout')->name('get.candidate.logout');
    Route::get('/verify/{email}/{verify_token}', 'CandidateController@verifyEmailDone')->name('get.candidate.verify_email_done');
    Route::get('/confirm-email-password', 'CandidateController@getConfirmEmailPassword')->name('get.candidate.confirm_email_password');
    Route::post('/confirm-email-password', 'CandidateController@postConfirmEmailPassword')->name('post.candidate.confirm_email_password');
    Route::get('/reset-password/{id}/{token}', 'CandidateController@getResetPassword')->name('get.candidate.reset_password');
    Route::post('/reset-password', 'CandidateController@postResetPassword')->name('post.candidate.reset_password');
});
