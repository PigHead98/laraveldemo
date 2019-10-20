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

Auth::routes();

Route::get('/', function() {
    return \Illuminate\Support\Facades\Redirect::to('login');
});

Route::group(['prefix' => 'quan-ly', 'middleware' => 'auth'], function() {
    Route::prefix('phong')->group(function() {
        Route::get('tat-ca', 'IndexController@allRoom')->name('admin/phong/tat-ca');
        Route::get('cap-nhat/{id?}', 'IndexController@updateRoom')->name('admin/phong/cap-nhat');
        Route::get('dat-phong/{id?}', 'IndexController@chooseRoom')->name('admin/phong/dat-phong');
        Route::post('save', 'IndexController@saveInfoUser')->name('admin/phong/dat-phong/save');
        Route::post('check', 'IndexController@check')->name('admin/phong/check');
    });
    Route::prefix('khach-hang')->group(function() {
        Route::get('tat-ca/{id?}', 'UserController@show')->name('admin/khach-hang/tat-ca');
        Route::get('cap-nhat/{id?}', 'IndexController@updateRoom')->name('admin/khach-hang/cap-nhat');
        Route::get('dat-phong/{id?}', 'IndexController@chooseRoom')->name('admin/khach-hang/dat-phong');
        Route::post('save', 'IndexController@saveInfoUser')->name('admin/khach-hang/dat-phong/save');
        Route::post('check', 'IndexController@check')->name('admin/khach-hang/check');
    });
    Route::prefix('dich-vu')->group(function() {
        Route::get('tat-ca/{id?}', 'IndexController@allProduct')->name('admin/dich-vu/tat-ca');
        Route::get('cap-nhat/{id?}', 'IndexController@updateProduct')->name('admin/dich-vu/cap-nhat');
        Route::get('order/{id?}', 'IndexController@orderProduct')->name('admin/dich-vu/order');
        Route::post('check', 'IndexController@checkProduct')->name('admin/dich-vu/check');
        Route::get('del/{id}', 'IndexController@delProduct')->name('admin/dich-vu/del');
    });
});
//Route::resource('demo', 'DemoController');
Route::middleware(['auth'])->prefix('quan-tri')->group(function() {
    Route::prefix('linh-vuc')->group(function() {
        Route::get('/', 'ManageController@index');
        Route::post('them-moi', 'ManageController@create');
        Route::get('/{id?}', 'ManageController@show')->where('id', '[0-9*]');
        Route::delete('xoa/{id}', 'ManageController@destroy');
    });
    //    Route::prefix('cau-hoi')->group(function() {
    //        Route::get('/', 'ManageController@index');
    //        Route::post('them-moi', 'ManageController@index');
    //        Route::get('{id}', 'ManageController@index');
    //        Route::delete('{id}/xoa', 'ManageController@index');
    //    });

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
