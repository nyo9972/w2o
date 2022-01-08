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
    return view('index');
});
Route::group([
    'namespace' => 'App\Http\Controllers'
], function () {

//Company endpoints
Route::get('/company-index', 'CompanyController@index')->name('companyIndex');

Route::post('/company-register', 'CompanyController@register')->name('companyRegister');

Route::get('/company-edit', 'CompanyController@edit')->name('companyEdit');

Route::post('/company-destroy', 'CompanyController@destroy')->name('companyDestroy');

Route::post('/company-link', 'CompanyController@link')->name('companyLink');

//Colaborator endpoints
Route::get('/colaborator-index', 'ColaboratorController@index')->name('colaboratorIndex');

Route::post('/colaborator-register', 'ColaboratorController@register')->name('colaboratorRegister');

Route::get('/colaborator-edit', 'ColaboratorController@edit')->name('colaboratorEdit');

Route::post('/colaborator-destroy', 'ColaboratorController@destroy')->name('colaboratorDestroy');

Route::get('/colaborator-information', 'ColaboratorController@information')->name('colaboratorInformation');

});