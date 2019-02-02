<?php

Route::group(['middleware' => 'web', 'prefix' => 'employer', 'namespace' => 'Modules\Employer\Http\Controllers'], function()
{
    Route::get('/', 'EmployerController@index');
});
