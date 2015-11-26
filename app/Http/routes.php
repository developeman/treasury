<?php

Route::get('/home',function(){
	dd(Session::get('user_password'));
	return Redirect::intended('/');
});

Route::get('/', 'HomeCtrl@index');

Route::get('page/{id}/{subid}', 'AdminPagesCtrl@frontsubpage');
Route::get('page/{id}', 'AdminPagesCtrl@frontpage');

Route::resource('/securities', 'FrontSecuritiesCtrl');


Route::get('login','ClientsCtrl@login');
Route::post('login/','ClientsCtrl@validate_login');
Route::get('login/valid','ClientsCtrl@check_password');
Route::post('login/valid','ClientsCtrl@do_login');

Route::post('login/resend','ClientsCtrl@resend_password');



Route::get('register','ClientsCtrl@register');
Route::post('register','ClientsCtrl@do_register');


Route::get('logout','ClientsCtrl@logout');

Route::group(['middleware' => 'auth'], function()
{
	Route::get('buy/{type}/{item_id}', 'PaymentCtrl@getCheckout');
	Route::get('success', 'PaymentCtrl@getDone');
	Route::get('cancel', 'PaymentCtrl@getCancel');

	Route::get('dashboard', 'DashboardCtrl@index');
	Route::get('dashboard/my_securities', 'DashboardCtrl@my_securities');


});


Route::get('admin/login','AdminCtrl@login');
Route::get('admin/logout','AdminCtrl@logout');
Route::POST('admin/login','AdminCtrl@do_login');

Route::group(['middleware' => 'authadmins'], function()
{
	Route::get('admin', 'AdminCtrl@index');
	Route::resource('admin/securities', 'AdminSecuritiesCtrl');
	Route::get('admin/securities/{id}/delete', 'AdminSecuritiesCtrl@delete');
	
	Route::post('admin/pages/sort', 'AdminPagesCtrl@sort');
	Route::resource('admin/pages', 'AdminPagesCtrl');
	Route::get('admin/pages/{id}/delete', 'AdminPagesCtrl@delete');




});
