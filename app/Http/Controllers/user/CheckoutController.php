<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class CheckoutController extends Controller
{
    //
    public function index()
    {
        //mengambil session user id
        $id_user = Auth::user()->id;

        //mengambil produk apa saja yang akan dibeli user dari table keranjang
        $keranjangs = DB::table('keranjang')
                        ->join('users', 'users.id', '=', 'keranjang.users_id')
                        ->join('foods', 'foods.id', '=', 'keranjang.foods_id')
                        ->select('foods.name as nama_produk', 'foods.gambar', 'users.name', 'keranjang.*', 'foods.price')
                        ->where('keranjang.users_id', '=', $id_user)
                        ->get();

        //menghitung ongkir jika cod maka akan ditambahkan 5000
        $ongkir = Order::get('ongkir');

        //mengambil alamat user untuk ditampilkan di view
        $alamat_user = DB::table('alamat')
                        ->select('alamat.*')
                        ->where('alamat.users_id',$id_user)
                        ->first();

        //membuat kode invoice
        $data = [
            'invoice' => 'ALV'.date('Ymdhi'),
            'keranjangs' => $keranjangs,
            'alamat' => $alamat_user,
            'ongkir' => $ongkir,
        ];

        return view('user.checkout',$data);

    }
}
