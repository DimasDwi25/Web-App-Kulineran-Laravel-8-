<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

/*Route::get('/', function () {
    return view('welcome');
}); */

Auth::routes();
Route::get('/', 'user\WelcomeController@index')->name('home');
Route::get('/home','user\WelcomeController@index')->name('home2');
Route::get('/kontak', 'user\WelcomeController@kontak')->name('kontak');
Route::get('/produk', 'user\FoodController@index')->name('produk');
Route::get('/produk/kategori/{id}', 'user\FoodController@filter')->name('produk.filter');
Route::get('/produk/{id}', 'user\FoodController@detail')->name('user.produk.detail');

/*Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');*/

Route::group(['middleware' => ['auth','CheckRole:admin']],function(){
    Route::get('/admin','admin\DashboardController@index')->name('admin.dashboard');

    Route::get('/admin/kategori', 'admin\CategorieController@index')->name('admin.categories');
    Route::get('/admin/kategori/tambah', 'admin\CategorieController@create')->name('admin.categories.tambah');
    Route::post('/admin/kategori/store', 'admin\CategorieController@store')->name('admin.categories.store');
    Route::get('/admin/kategori/edit/{id}', 'admin\CategorieController@edit')->name('admin.categories.edit');
    Route::post('/admin/kategori/update/{id}', 'admin\CategorieController@update')->name('admin.categories.update');
    Route::get('/admin/kategori/destroy/{id}', 'admin\CategorieController@destroy')->name('admin.categories.destroy');

    Route::get('/admin/foods', 'admin\FoodController@index')->name('admin.foods');
    Route::get('/admin/foods/tambah', 'admin\FoodController@create')->name('admin.foods.tambah');
    Route::post('/admin/foods/store', 'admin\FoodController@store')->name('admin.foods.store');
    Route::get('/admin/foods/edit/{id}', 'admin\FoodController@edit')->name('admin.foods.edit');
    Route::post('/admin/foods/update/{id}', 'admin\FoodController@update')->name('admin.foods.update');
    Route::get('/admin/foods/destroy/{id}', 'admin\FoodController@destroy')->name('admin.foods.destroy');

    Route::get('/admin/kurir', 'admin\CourierController@index')->name('admin.couriers');
    Route::get('/admin/kurir/tambah', 'admin\CourierController@create')->name('admin.couriers.tambah');
    Route::post('/admin/kurir/store', 'admin\CourierController@store')->name('admin.couriers.store');
    Route::get('/admin/kurir/edit/{id}', 'admin\CourierController@edit')->name('admin.couriers.edit');
    Route::post('/admin/kurir/update/{id}', 'admin\CourierController@update')->name('admin.couriers.update');
    Route::get('/admin/kurir/destroy/{id}', 'admin\CourierController@destroy')->name('admin.couriers.destroy');

    Route::get('/admin/rekening', 'admin\RekeningController@index')->name('admin.rekening');
    Route::get('/admin/rekening/tambah', 'admin\RekeningController@create')->name('admin.rekening.tambah');
    Route::post('/admin/rekening/store', 'admin\RekeningController@store')->name('admin.rekening.store');
    Route::get('/admin/rekening/edit/{id}', 'admin\RekeningController@edit')->name('admin.rekening.edit');
    Route::post('/admin/rekening/update/{id}', 'admin\RekeningController@update')->name('admin.rekening.update');
    Route::get('/admin/rekening/destroy/{id}', 'admin\RekeningController@destroy')->name('admin.rekening.destroy');

    Route::get('/admin/transaksi', 'admin\TransaksiController@index')->name('admin.transaksi');
    Route::get('/admin/transaksi/detail/{id}', 'admin\TransaksiController@details')->name('admin.transaksi.detail');
    Route::get('/admin/transaksi/perludicek', 'admin\TransaksiController@perludicek')->name('admin.transaksi.perludicek');
    Route::get('/admin/transaksi/perludikirim', 'admin\TransaksiController@perludikirim')->name('admin.transaksi.perludikirim');
    Route::get('/admin/transaksi/dikirim', 'admin\TransaksiController@dikirim')->name('admin.transaksi.dikirim');
    Route::get('/admin/transaksi/selesai', 'admin\TransaksiController@selesai')->name('admin.transaksi.selesai');
    Route::get('/admin/transaksi/dibatalkan', 'admin\TransaksiController@dibatalkan')->name('admin.transaksi.dibatalkan');
    Route::get('/admin/transaksi/konfirmasi/{id}', 'admin\TransaksiController@konfirmasi')->name('admin.transaksi.konfirmasi');
    Route::post('/admin/transaksi/inputresi/{id}', 'admin\TransaksiController@inputresi')->name('admin.transaksi.inputresi');

    Route::get('/admin/pelanggan', 'admin\PelangganController@index')->name('admin.pelanggan');
});

Route::group(['middleware' => ['auth','CheckRole:customer']],function(){
    Route::get('/alamat', 'user\AlamatController@index')->name('user.alamat');
    Route::post('/alamat/simpan', 'user\AlamatController@simpan')->name('user.alamat.simpan');
    Route::get('/alamat/ubah/{id}', 'user\AlamatController@ubah')->name('user.alamat.ubah');
    Route::post('/alamat/update/{id}', 'user\AlamatController@update')->name('user.alamat.update');

    Route::get('/keranjang', 'user\KeranjangController@index')->name('user.keranjang');
    Route::post('/keranjang/simpan', 'user\KeranjangController@simpan')->name('user.keranjang.simpan');
    Route::post('/keranjang/update', 'user\KeranjangController@update')->name('user.keranjang.update');
    Route::get('/keranjang/delete/{id}', 'user\KeranjangController@destroy')->name('user.keranjang.destroy');

    Route::get('/order', 'user\OrderController@index')->name('user.order');
    Route::get('/order/detail/{id}', 'user\OrderController@detail')->name('user.order.detail');
    Route::post('/order/simpan', 'user\OrderController@simpan')->name('user.order.simpan');
    Route::get('/order/sukses', 'user\OrderController@sukses')->name('user.order.sukses');
    Route::get('/order/pembayaran/{id}', 'user\OrderController@pembayaran')->name('user.order.pembayaran');
    Route::post('/order/kirimbukti/{id}', 'user\OrderController@buktiPembayaran')->name('user.order.kirimbukti');
    Route::get('/order/pesananditerima/{id}', 'user\OrderController@pesananditerima')->name('user.order.pesananditerima');
    Route::resource('orders', user\OrderController::class)->only(['show']);
    // Route::get('/order/midtrans/{id}', 'user\OrderController@indexMidtrans')->name('user.order.midtrans');
    // Route::get('order/midtrans/show/{id}', 'user\OrderController@show')->name('user.order.show');

    Route::get('/checkout', 'user\CheckoutController@index')->name('user.checkout');
});
