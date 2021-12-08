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
Route::get('dashboard',function(){
    return view('dashboard');
});

Route::get('/register','registration@displayform');

Route::post('submit','registration@save');

Route::get('/displaydata','registration@viewdata');

Route::get('/displaydata','registration@index');

Route::get('/addData','registration@displayform');

Route::get('click_edit/{id}','registration@edit_function');

Route::post('/update/{id}','registration@update_function');

Route::get('/login','loginController@displayform');

Route::post('signin','loginController@check');

Route::get('/display_user_data','loginControllern@viewdata');

Route::get('/display_user_data','loginController@index');

Route::get('click_userdata_edit/{id}','loginController@edit_function');

Route::post('/update_userdata/{id}','loginController@update_function');

Route::get('display_geofence_data','geofenceController@viewdata');

Route::get('display_geofence_data','geofenceController@index');

Route::get('click_geofence_edit/{id}','geofenceController@edit_function');

Route::get('click_geofence_update/{id}','geofenceController@update_on_map_function');

Route::post('/update_geofence_data/{id}','geofenceController@update_function');

Route::get('click_showmap/{id}','geofenceController@showmap');

Route::get('/addGeofenceData','geofenceController@show_add_geofence_map');

Route::post('/update_geofencedata','geofenceController@add_new_geofence');

Route::post('/update_geofencedata_on_map/{id}','geofenceController@update_geofence_on_map');

Route::get('display_department_data','departmentController@viewdata');
    
Route::get('display_department_data','departmentController@index');

Route::get('click_department_edit/{id}','departmentController@edit_function');

Route::post('/update_department_data/{id}','departmentController@update_function');

Route::get('/import_excel','ImportExcelController@index');
Route::post('/import_excel/import','ImportExcelController@import');



