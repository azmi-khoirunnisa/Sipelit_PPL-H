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


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


Route::resource('/admin/users', 'Admin\UsersController', ['except' => ['show','create','store']]);

Route::namespace('Admin')->prefix('admin')->middleware(['auth','auth.admin'])->name('admin.')->group(function(){
  Route::resource('/users','UsersController', ['except'=>['show','create','store']]);
});

Route::group(['middleware'=>['auth']], function(){
  Route::prefix('admin')->group(function(){
    Route::get('/',function(){
      return view('admin.dashboard');
    })->name('admin.dashboard');
  });

  Route::prefix('pemborong')->group(function(){
    Route::get('/',function(){
      return view('pemborong');
    })->name('pemborong');
    Route::resource('/tanggapan', 'Pemborong\TanggapanController');
  });
});



Route::group(['middleware'=>['auth']], function(){
  Route::prefix('petani')->group(function(){
    Route::get('/',function(){
      return view('petani.dashboard');
    })->name('petani.dashboard');
  });
});









Route::resource('/datapanen', 'Petani\DataPanenController');
Route::get('/pemborong', 'Pemborong\DashboardController@index')->name('pemborong');


Route::get('/user/{id}', 'UserController@profile')->name('user.profile');
Route::get('/edit/user/', 'UserController@edit')->name('user.edit');
Route::post('/edit/user/', 'UserController@update')->name('user.update');
//Route::get('/admin/datapanen', 'Admin\DataPanenController@index')->name('datapanen.index');
