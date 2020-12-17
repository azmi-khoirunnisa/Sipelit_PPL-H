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
    Route::resource('/berita','Admin\BeritaController');
    Route::get('/berita','Admin\BeritaController@index')->name('berita.index');
    Route::get('/berita/create','Admin\BeritaController@create')->name('berita.create');
    Route::post('/berita','Admin\BeritaController@store')->name('berita.store');
    Route::get('/berita/edit/{id}','Admin\BeritaController@edit')->name('berita.edit');
    Route::patch('/berita/update','Admin\BeritaController@update')->name('berita.update');
    Route::delete('berita/hapus/{id}','Admin\BeritaController@destroy')->name('berita.destroy');
  });

  Route::prefix('pemborong')->group(function(){
    Route::get('/',function(){
      return view('pemborong');
    })->name('pemborong');
    Route::resource('/tanggapan','Pemborong\TanggapanController');
    Route::get('/berita','Pemborong\DashboardController@berita')->name('pemborong.berita');
  });
});


/*Route::namespace('petani')->prefix('petani')->middleware(['auth','auth.petani'])->name('petani.')->group(function(){
  Route::get('/',function(){
    return view('petani.dashboard');
  })->name('petani.dashboard');
});*/


Route::group(['middleware'=>['auth']], function(){
  Route::prefix('petani')->group(function(){
    Route::get('/',function(){
      return view('petani.dashboard');
    })->name('petani.dashboard');
    Route::resource('/datapanen', 'Petani\DataPanenController');
    Route::get('/berita','Petani\DashboardController@berita')->name('petani.berita');
  });
});







//Route::get('/pemborong/tanggapan', 'Pemborong\TanggapanController@index')->name('pemborong.tanggapan');
//Route::post('/tanggapan/{id}', 'Pemborong\TanggapanController@show')->name('tanggapan.show');
//Route::post('/tanggapan/store', 'Pemborong\TanggapanController@store')->name('tanggapan.store');
//Route::post('/tanggapan/{id}','Pemborong\DashboardController@show')->name('dashboard.show');
//Route::resource('/pemborong/dashboard','Pemborong\DashboardController');
//Route::resource('/tanggapan', 'Pemborong\TanggapanController');
//Route::post('/daftar-pemborong', 'daftarController@create')->name('daftar.create');
//Route::get('/daftar-pemborong', 'daftarController@index')->name('daftar.index');


Route::get('/pemborong', 'Pemborong\DashboardController@index')->name('pemborong');


Route::get('/user/{id}', 'UserController@profile')->name('user.profile');
Route::get('/edit/user/', 'UserController@edit')->name('user.edit');
Route::post('/edit/user/', 'UserController@update')->name('user.update');

//Route::get('/admin/datapanen', 'Admin\DataPanenController@index')->name('datapanen.index');
