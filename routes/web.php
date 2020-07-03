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
    return view('welcome');
});
Route::get('/login','LoginController@index')->name('login');
Route::post('/postlogin','LoginController@postlogin');
Route::get('/logout', 'LoginController@logout');

Route::group(['middleware' => ['auth','checkRole:ADM']], function () {
    Route::get('/dashboard','DashboardController@dashboard')->name('dashboard');
    Route::get('/blank','DashboardController@blank')->name('blank');

    //User
    Route::get('/admin/user','UserController@user')->name('user');
    Route::post('/admin/createuser','UserController@create');
    Route::get('/admin/user/{id}/useredit','UserController@useredit');
    Route::post('/admin/user/{id}/userupdate','UserController@userupdate');
    Route::get('/admin/user/{id}/userdelete','UserController@userdelete');
    Route::get('/admin/user/{id}/findbyid','UserController@userfindbyid');
    // export
    Route::get('/admin/user/export','EximController@export')->name('export');
    Route::get('/admin/exim','EximController@exim')->name('exim');
    Route::get('/admin/user/import','EximController@import');
    Route::get('/admin/user/exportpdf','UserController@exportPdf');
    Route::post('/admin/user/import','EximController@import')->name('import');

    //Param
    Route::get('/admin/param','ParamController@param')->name('param');
    Route::post('/admin/paramcreate','ParamController@paramcreate');
    Route::get('/admin/param/{id}/paramedit','ParamController@paramedit');
    Route::post('/admin/param/{id}/paramupdate','ParamController@paramupdate');
    Route::get('/admin/param/{id}/paramdelete','ParamController@paramdelete');

    //peserta Divisi
    Route::get('/admin/divisi','DivisiController@divisi')->name('divisi');
    Route::post('/admin/divisicreate','DivisiController@divisicreate');
    Route::get('/admin/divisi/{id}/divisiedit','DivisiController@divisiedit');
    Route::post('/admin/divisi/{id}/divisiupdate','DivisiController@divisiupdate');
    Route::get('/admin/divisi/{id}/divisidelete','DivisiController@divisidelete');

     //peserta departemen
     Route::get('/admin/departemen','DepartemenController@departemen')->name('departemen');
     Route::post('/admin/departemencreate','DepartemenController@departemencreate');
     Route::get('/admin/departemen/{id}/departemenedit','DepartemenController@departemenedit');
     Route::post('/admin/departemen/{id}/departemenupdate','DepartemenController@departemenupdate');
     Route::get('/admin/departemen/{id}/departemendelete','DepartemenController@departemendelete');
     Route::get('/admin/departemen/{divisi_kode}/departemenbydivisi','DepartemenController@departemenbydivisi')->name('departemenbydivisi');

    //Training
    Route::get('/training/training/','TrainingController@training')->name('training');
    Route::post('/training/trainingcreate','TrainingController@trainingcreate');
    Route::get('/training/training/{id}/trainingedit','TrainingController@trainingedit');
    Route::post('/training/training/{id}/trainingupdate','TrainingController@trainingupdate');
    Route::get('/training/training/{id}/trainingdelete','TrainingController@trainingdelete');
    Route::get('/training/traininglist','TrainingController@traininglist')->name('traininglist');

    //peserta training
    Route::get('/training/pesertatraining/{id}','PesertatrainingController@pesertatraining')->name('pesertatraining');
    Route::post('/training/pesertatrainingcreate','PesertatrainingController@pesertatrainingcreate');
    Route::get('/training/pesertatraining/{id}/pesertatrainingedit','PesertatrainingController@pesertatrainingedit');
    Route::post('/training/pesertatraining/{id}/pesertatrainingupdate','PesertatrainingController@pesertatrainingupdate');
    Route::get('/training/pesertatraining/{id}/pesertatrainingdelete','PesertatrainingController@pesertatrainingdelete');


    

     
    });

    Route::group(['middleware' => ['auth','checkRole:ADM,USR']], function () {
        Route::get('/dashboard','DashboardController@dashboard')->name('dashboard');

         // Proker
        Route::get('/job/proker','ProkerController@proker')->name('proker');
        Route::post('/job/prokercreate','ProkerController@prokercreate');
        Route::get('/job/proker/{id}/prokeredit','ProkerController@prokeredit');
        Route::post('/job/proker/{id}/prokerupdate','ProkerController@prokerupdate');
        Route::get('/job/proker/{id}/prokerdelete','ProkerController@prokerdelete');

        // ProkerTask
        Route::get('/job/prokertask/{id}','ProkerTaskController@prokertask')->name('prokertask');
        Route::post('/job/prokertaskcreate','ProkerTaskController@prokertaskcreate');
        Route::get('/job/prokertask/{id}/prokertaskedit','ProkerTaskController@prokertaskedit');
        Route::post('/job/prokertask/{id}/prokertaskupdate','ProkerTaskController@prokertaskupdate');
        Route::get('/job/prokertask/{id}/prokertaskdelete','ProkerTaskController@prokertaskdelete');

        Route::get('/admin/user/{id}/findbyid','UserController@userfindbyid');
        //DOWLOAD
        Route::get('/upload', 'UploadController@upload');
        Route::post('/upload/proses', 'UploadController@proses_upload');


    });