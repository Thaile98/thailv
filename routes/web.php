<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('home-page', function () {
    return view('home_page');
})->middleware('web');

Route::get('page-login', function () {
    return view('page_login');
})->middleware('web');

// Route::get('/search-job', function () {
//     return view('search_job');
// });

Route::get('/job-detail', function () {
    return view('job_detail');
});

// Route::get('bai-viet', function () {
//     return view('posts');
// });

Route::get('post-detail', function () {
    return view('post_detail');
});

Route::get('/bai-viet/{id}', 'ArticleFrontendController@show')->name('bai-viet')->middleware('CheckViewArticle');

Route::get('danh-muc/{id}', 'CategoryFrontendController@showCategoryDetail');
Auth::routes();



Route::get('/search-job', 'JobController@showJobInSearchJob');
// Route::get('/job-detail', 'JobController@showJobDetail');


// Route::get('/job-data', 'JobDataController@showJobData');
