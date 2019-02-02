<?php
Route::group(['middleware' => 'web','prefix' => 'authenticate', 'namespace' => 'Modules\Admin\Http\Controllers'], function()
{
	Route::get('/login', 'AdminController@getLogin')->name('get.admin.login')->middleware('check_admin');
	Route::post('/login', 'AdminController@postLogin')->name('post.admin.login');
	Route::get('/logout', 'AdminController@getLogout')->name('get.admin.logout');
});

Route::group(['middleware' => ['web','is_admin'],'prefix' => 'admin', 'namespace' => 'Modules\Admin\Http\Controllers'], function()
{
	Route::get('dashboard', 'AdminDashBoardController@index')->name('get.dashboard');

	Route::get('/list', 'AdminController@getList')->name('get.admin.list')->middleware('check_permission:admin-list');
	Route::get('/create', 'AdminController@create')->name('get.admin.create')->middleware('check_permission:admin-create');
	Route::post('/create', 'AdminController@store')->name('post.admin.create')->middleware('check_permission:admin-create');
	Route::get('/edit/{id}', 'AdminController@edit')->name('get.admin.edit')->middleware('check_permission:admin-edit');
	Route::post('/edit/{id}', 'AdminController@update')->name('post.admin.update')->middleware('check_permission:admin-edit');
	Route::get('/delete/{id}', 'AdminController@delete')->name('get.admin.delete')->middleware('check_permission:admin-delete');

	Route::group(['prefix'=>'roles'],function()
	{
		Route::get('', 'RoleController@getList')->name('get.role.list')->middleware('check_permission:role-list');
		Route::get('/create', 'RoleController@create')->name('get.role.create')->middleware('check_permission:role-create');
		Route::post('/create', 'RoleController@store')->name('post.role.save')->middleware('check_permission:role-create');
		Route::get('/edit/{id}', 'RoleController@edit')->name('get.role.edit')->middleware('check_permission:role-edit');
		Route::post('/edit/{id}', 'RoleController@update')->name('post.role.update')->middleware('check_permission:role-edit');
		Route::get('/delete/{id}', 'RoleController@delete')->name('get.role.delete')->middleware('check_permission:role-delete');
	});

	Route::group(['prefix'=>'permissions'],function()
	{
		Route::get('', 'PermissionController@getList')->name('get.permission.list')->middleware('check_permission:permission-list');
		Route::get('/create', 'PermissionController@create')->name('get.permission.create')->middleware('check_permission:permission-create');
		Route::post('/create', 'PermissionController@store')->name('post.permission.save')->middleware('check_permission:permission-create');
		Route::get('/edit/{id}', 'PermissionController@edit')->name('get.permission.edit')->middleware('check_permission:permission-edit');
		Route::post('/edit/{id}', 'PermissionController@update')->name('post.permission.update')->middleware('check_permission:permission-edit');
		Route::get('/delete/{id}', 'PermissionController@delete')->name('get.permission.delete')->middleware('check_permission:permission-delete');
	});


	Route::group(['prefix'=>'/categories'],function()
	{
		Route::get('/create', 'CategoryController@create')->name('get.category.create')->middleware('check_permission:category-create');
		Route::post('/create', 'CategoryController@store')->name('post.category.create')->middleware('check_permission:category-create');
		Route::get('/edit/{id}', 'CategoryController@edit')->name('get.category.edit')->middleware('check_permission:category-edit');
		Route::post('/edit/{id}', 'CategoryController@update')->name('post.category.update')->middleware('check_permission:category-edit');
		Route::get('/delete/{id}', 'CategoryController@delete')->name('get.category.delete')->middleware('check_permission:category-delete');

	});


	Route::group(['prefix'=>'/articles'],function()
	{
		Route::get('', 'ArticleController@getList')->name('get.article.list')->middleware('check_permission:article-list');

		Route::get('/view', 'ArticleController@viewAjax')->name('get.article.view');

		Route::get('/create', 'ArticleController@create')->name('get.article.create')->middleware('check_permission:article-create');
		Route::post('/create', 'ArticleController@store')->name('post.article.create')->middleware('check_permission:article-create');

		Route::get('edit/{id}', 'ArticleController@edit')->name('get.article.edit')->middleware('check_permission:article-edit');
		Route::post('/edit/{id}', 'ArticleController@update')->name('post.article.update')->middleware('check_permission:article-edit');

		Route::get('/delete/{id}', 'ArticleController@delete')->name('get.article.delete')->middleware('check_permission:article-delete');
		Route::get('/accept/{id}', 'ArticleController@accept')->name('get.article.accept')->middleware('check_permission:article-inspec');
		Route::post('/cancel', 'ArticleController@cancel')->name('post.article.cancel')->middleware('check_permission:article-inspec');
		Route::get('/search/tag', 'ArticleController@searchTag')->name('get.article.search_tag');
	});

	Route::group(['prefix'=>'sidebar'],function()
	{
		Route::get('', 'SidebarAdminServiceController@getList')->name('get.sidebar_item.list');

		Route::get('/create', 'SidebarAdminServiceController@create')->name('get.sidebar_item.create');
		Route::post('/create', 'SidebarAdminServiceController@store')->name('post.sidebar_item.store');

		Route::get('edit/{id}', 'SidebarAdminServiceController@edit')->name('get.sidebar_item.edit');
		Route::post('/edit/{id}', 'SidebarAdminServiceController@update')->name('post.sidebar_item.update');

		Route::get('/delete/{id}', 'SidebarAdminServiceController@delete')->name('get.sidebar_item.delete');
		
	});

	Route::group(['prefix'=>'candidate'],function()
	{
		Route::get('', 'CandidateController@getList')->name('get.candidate.list');

		// Route::get('/create', 'CandidateController@create')->name('get.candidate.create');
		// Route::post('/create', 'CandidateController@store')->name('post.candidate.store');

		// Route::get('edit/{id}', 'CandidateController@edit')->name('get.candidate.edit');
		// Route::post('/edit/{id}', 'CandidateController@update')->name('post.candidate.update');

		// Route::get('/delete/{id}', 'CandidateController@delete')->name('get.candidate.delete');
		
	});
});
