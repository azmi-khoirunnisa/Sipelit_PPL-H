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

/*Route::get('/admin', function(){
  return 'you are admin';
})->middleware(['auth','auth.admin']);*/

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
  Route::prefix('petani')->group(function(){
    Route::get('/',function(){
      return view('petani.dashboard');
    })->name('petani.dashboard');
  });
});

Route::resource('/datapanen', 'Petani\DataPanenController');
