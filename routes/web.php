<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',                                         'App\Http\Controllers\PageController@login');
Route::get('/register',                                 'App\Http\Controllers\PageController@register');
Route::get('/verification',                             'App\Http\Controllers\PageController@verify');
Route::get('/forgetPassword',                           'App\Http\Controllers\PageController@forget');
Route::get('/forgetVerification',                       'App\Http\Controllers\PageController@forgetverify');
Route::get('/Dashboard',                                'App\Http\Controllers\PageController@dashboard');
Route::get('/make-revenue',                             'App\Http\Controllers\PageController@makeRevenue');
Route::get('/revenue-history',                          'App\Http\Controllers\PageController@revenueHistory');
Route::get('/make-expenditure',                         'App\Http\Controllers\PageController@makeExpenditure');
Route::get('/expenditure-history',                      'App\Http\Controllers\PageController@expenditureHistory');
Route::get('/logout',                                   'App\Http\Controllers\PageController@logout');
Route::get('/balance',                                  'App\Http\Controllers\PageController@balance');

Route::post('/login',                                   'App\Http\Controllers\authController@login');
Route::post('/register',                                'App\Http\Controllers\authController@register');
Route::post('/verification',                            'App\Http\Controllers\authController@verify');
Route::post('/make-revenue',                            'App\Http\Controllers\authController@makeRevenue');
Route::post('/make-expenditure',                        'App\Http\Controllers\authController@makeExpenditure');
Route::post('/forgetPassword',                          'App\Http\Controllers\authController@forget');
Route::post('/forgetVerification',                      'App\Http\Controllers\authController@forgetverify');
