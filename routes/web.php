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

// Route::get('/app', function () {
    
//     // User::find(1)->notify(new AdminNotify);

//     return view('frontend.layouts.app');
// });

Auth::routes();
Route::post('/loginuser','Auth\LoginController@userLogin');
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/syarat_ketentuan', function () {
    return view('frontend.syarat_ketentuan');
});

Route::get('/invoice', function () {
    return view('frontend.invoice');
});

Route::get('/','Frontend\HomeController@index')->name('home');
Route::get('/home','Frontend\HomeController@index')->name('home');
Route::get('/foto','Frontend\MediaController@foto');
Route::get('/video','Frontend\MediaController@video');
Route::get('/detail_video/{id}','Frontend\MediaController@detailVideo');
// Route::get('/design-baju','Frontend\MediaController@designBaju');

Route::get('/pengumuman','Frontend\PengumumanController@index');
Route::get('/detail_pengumuman/{id}','Frontend\PengumumanController@detailPengumuman');

Route::group(['middleware' => 'is.user'], function () {
    Route::get('/profile','Frontend\ProfileController@index');
    Route::get('/list-peserta','Frontend\ProfileController@listPeserta');
    Route::get('/detail-peserta/{id}','Frontend\ProfileController@detailPeserta');
    Route::put('/upload-bukti/{id}','Frontend\ProfileController@uploadBukti');
    Route::get('/download-invoice/{id}','Frontend\ProfileController@downloadInvoice');

    Route::put('/info-peserta/{order}','Frontend\DaftarPesertaController@index');
    Route::get('/order-baju/{order}','Frontend\DaftarPesertaController@orderBaju');
    Route::get('/daftar','Frontend\DaftarPesertaController@orderPaket');
    Route::post('/daftar','Frontend\DaftarPesertaController@daftarPeserta');
});


Route::prefix('admin')->group(function() {
    
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

    Route::get('/', 'Backend\AdminController@index')->name('admin.home');
    Route::get('/clear-notif', 'Backend\AdminController@clearNotif');
    Route::get('/peserta', 'Backend\PesertaController@dataPeserta');
    Route::get('/transaksi_peserta', 'Backend\PesertaController@transaksiPeserta');
    Route::get('/detail_peserta/{id}', 'Backend\PesertaController@detailPeserta');
    Route::put('/update_transaksi/{id}', 'Backend\PesertaController@updateStatus');
    //crud
    Route::resource('/agama','Backend\AgamaController');
    Route::resource('/prodi','Backend\ProdiController');
    Route::resource('/jabatan','Backend\JabatanController');
    Route::resource('/user','Backend\UserController');
    Route::resource('/periode_pendaftaran','Backend\PeriodePendaftaranController');
    Route::resource('/fasilitas','Backend\FasilitasController');
    Route::resource('/pengumuman','Backend\PengumumanController');
    Route::resource('/foto','Backend\FotoController');
    Route::resource('/video','Backend\VideoController');
});

// GUEST ONLY ROUTES
Route::group(['middleware' => 'is.guest'], function () {
    // Route::get('/resendverify/{user}', 'Auth\RegisterController@resendVerify')->name('resendVerify');
    Route::get('/verify-user/{code}', 'Auth\RegisterController@activateUser')->name('activate.user');
    Route::get('/viewlogin','Auth\LoginController@viewLogin')->name('viewlogin');
});

