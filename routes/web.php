<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/login',[
	'as' => 'login',
    'uses' => 'AuthController@login'
]);

Route::get('/logout',[
	'as' => 'logout',
    'uses' => 'AuthController@logout'
]);

Route::get('/track-document/{tracking_number}',[
	'as' => 'track-document',
    'uses' => 'AuthController@track_document'
]);

Route::get('/',[
	'as' => 'trackdocument',
    'uses' => 'AuthController@trackdocument'
]);

Route::get('/trackdocument',[
	'as' => 'trackdocument',
    'uses' => 'AuthController@trackdocument'
]);


Route::get('/add-user',[
	'as' => 'add-user',
    'uses' => 'DocumentsController@add_user'
]);

Route::get('/add-document',[
	'as' => 'add-document',
    'uses' => 'DocumentsController@add_document'
]);

Route::get('/show-documents',[
	'as' => 'show-documents',
    'uses' => 'DocumentsController@show_documents'
]);

Route::get('/view-document/{tracking_number}',[
	'as' => 'view-document',
    'uses' => 'DocumentsController@view_document'
]);

Route::get('/edit-document/{tracking_number}',[
	'as' => 'edit-document',
    'uses' => 'DocumentsController@edit_document'
]);

Route::get('/show-users',[
	'as' => 'show-users',
    'uses' => 'DocumentsController@show_users'
]);

Route::get('/edit-user/{division_name}',[
	'as' => 'edit-user',
    'uses' => 'DocumentsController@edit_user'
]);

Route::get('/records-dashboard',[
	'as' => 'records-dashboard',
    'uses' => 'DocumentsController@records_dashboard'
]);

Route::get('/print-document/{tracking_number}',[
	'as' => 'print-document',
    'uses' => 'DocumentsController@print_document'
]);

Route::get('/generate-report',[
	'as' => 'generate-report',
    'uses' => 'DocumentsController@generate_report'
]);

Route::get('/generate-report',[
	'as' => 'generate-report',
    'uses' => 'DocumentsController@generate_report'
]);

Route::post('/p/filter-report',[
	'as' => 'filter-report',
    'uses' => 'DocumentsController@filter_report'
]);


Route::get('/user-show-documents',[
	'as' => 'user-show-documents',
    'uses' => 'UserController@user_show_documents'
]);

Route::get('/user-view-document/{tracking_number}',[
	'as' => 'user-view-document',
    'uses' => 'UserController@user_view_document'
]);

Route::get('/user-dashboard',[
	'as' => 'user-dashboard',
    'uses' => 'UserController@user_dashboard'
]);

Route::get('/add-user-document',[
	'as' => 'add-user-document',
    'uses' => 'UserController@user_add_document'
]);

Route::get('/user-print-document/{tracking_number}',[
	'as' => 'user-print-document',
    'uses' => 'UserController@user_print_document'
]);


Route::post('/p/store-user',[
    'as' => 'store-user',
    'uses' => 'DocumentsController@store_user'
]);

Route::post('/p/update-user',[
    'as' => 'update-user',
    'uses' => 'DocumentsController@update_user'
]);

Route::post('/p/authenticate',[
    'as' => 'authenticate',
    'uses' => 'AuthController@authenticate'
]);

Route::post('/p/search-document',[
	'as' => 'search-document',
    'uses' => 'AuthController@search_document'
]);

Route::post('/p/store-document',[
    'as' => 'store-document',
    'uses' => 'DocumentsController@store_document'
]);

Route::post('/p/update-document',[
    'as' => 'update-document',
    'uses' => 'DocumentsController@update_document'
]);

Route::post('/p/delete-document',[
    'as' => 'delete-document',
    'uses' => 'DocumentsController@delete_document'
]);

Route::post('/p/receive-document',[
    'as' => 'receive-document',
    'uses' => 'AuthController@receive_document'
]);

Route::post('/p/user-store-document',[
    'as' => 'user-store-document',
    'uses' => 'UserController@user_store_document'
]);

