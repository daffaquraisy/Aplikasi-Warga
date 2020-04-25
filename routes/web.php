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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();


Route::group(['middleware' => ['auth']], function () {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('/users', 'UserController');

    Route::get('/see/informations', 'InformationController@seeAllInformations')->name('see.informations');
    Route::resource('/informations', 'InformationController')->except(['show']);

    Route::get('/pdf/patriarches', 'PatriarchController@exportPdf')->name('export.pdf.patriarches');
    Route::get('/excel/patriarches', 'PatriarchController@exportExcel')->name('export.excel.patriarches');
    Route::resource('/patriarches', 'PatriarchController');

    Route::get('/pdf/residents', 'ResidentController@exportPdf')->name('export.pdf.residents');
    Route::get('/excel/residents', 'ResidentController@exportExcel')->name('export.excel.residents');

    Route::get('/residents/rt1', 'ResidentController@queryByRt1')->name('residents.rt1');
    Route::get('/residents/rt2', 'ResidentController@queryByRt2')->name('residents.rt2');
    Route::get('/residents/rt3', 'ResidentController@queryByRt3')->name('residents.rt3');
    Route::get('/residents/rt4', 'ResidentController@queryByRt4')->name('residents.rt4');
    Route::get('/residents/rt5', 'ResidentController@queryByRt5')->name('residents.rt5');
    Route::get('/residents/rt6', 'ResidentController@queryByRt6')->name('residents.rt6');
    Route::get('/residents/rt7', 'ResidentController@queryByRt7')->name('residents.rt7');

    Route::get('residents/trash', 'ResidentController@trash')->name('residents.trash');
    Route::post('/residents/{id}/restore', 'ResidentController@restore')->name('residents.restore');
    Route::get('/ajax/residents/search', 'ResidentController@ajaxSearch');
    Route::resource('/residents', 'ResidentController');

    // URL
    Route::get('/DataRT1', 'ResidentController@queryByRt1');
});
