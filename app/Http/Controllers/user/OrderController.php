<?php

namespace App\Http\Controllers\user;

use App\Models\Order;
use App\Models\Rekening;
use App\Models\DetailOrder;
use App\Models\StatusOrder;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use App\Services\Midtrans\CreateSnapTokenService;

class OrderController extends Controller
{
    //
    public function index()
    {
        //menampilkan semua pesanan
        $user_id = Auth::user()->id;

        $order = DB::table('order')
                    ->join('status_order','status_order.id','=','order.status_order_id')
                    ->select('order.*','status_order.name')
                    ->where('order.status_order_id',1)
                    ->where('order.users_id',$user_id)
                    ->get();
        $dicek = DB::table('order')
                    ->join('status_order','status_order.id','=','order.status_order_id')
                    ->select('order.*','status_order.name')
                    ->where('order.status_order_id','!=',1)
                    ->Where('order.status_order_id','!=',5)
                    ->Where('order.status_order_id','!=',6)
                    ->where('order.users_id',$user_id)
                    ->get();
        $histori = DB::table('order')
                    ->join('status_order','status_order.id','=','order.status_order_id')
                    ->select('order.*','status_order.name')
                    ->where('order.status_order_id','!=',1)
                    ->Where('order.status_order_id','!=',2)
                    ->Where('order.status_order_id','!=',3)
                    ->Where('order.status_order_id','!=',4)
                    ->where('order.users_id',$user_id)
                    ->get();
        $data = array(
            'order' => $order,
            'dicek' => $dicek,
            'histori'=> $histori
        );
        return view('user.order.order',$data);
    }

    public function detail($id)
    {
        //
        $detail_order = DB::table('details_order')
                            ->join('foods','foods.id', '=', 'details_order.food_id')
                            ->join('order','order.id', '=', 'details_order.order_id')
                            ->select('foods.name as nama_produk', 'foods.gambar', 'details_order.*', 'foods.price','order.*')
                            ->where('details_order.order_id',$id)
                            ->get();

        $order = DB::table('order')
                    ->join('users','users.id', '=', 'order.users_id')
                    ->join('status_order', 'status_order.id', '=', 'order.status_order_id')
                    ->select('order.*', 'users.name as nama_pelanggan', 'status_order.name as status')
                    ->where('order.id',$id)
                    ->first();

        $data = array(
            'detail' => $detail_order,
            'order' => $order
        );

        return view('user.order.detail',$data);
    }

    public function simpan(Request $request)
    {
        //menyimpan pesanan ke table order
        $cek_invoice = DB::table('order')
                        ->where('invoice', $request->invoice)
                        ->count();

        if ($cek_invoice < 1) {
            $user_id = Auth::user()->id;

            //jika user memilih cod maka tampilkan data ini
            if ($request->metode_pembayaran == 'cod') {
                Order::create([
                    'invoice' => $request->invoice,
                    'users_id' => $user_id,
                    'sub_total' => $request->sub_total,
                    'status_order_id' => 1,
                    'metode_pembayaran' => $request->metode_pembayaran,
                    'biaya_cod' => 10000,
                    'ongkir' => $request->ongkir,
                    'no_hp' => $request->no_hp,
                    'pesan' => $request->pesan
                ]);
            }else{
                //jika user memilih transfer
                Order::create([
                    'invoice' => $request->invoice,
                    'users_id' => $user_id,
                    'sub_total' => $request->sub_total,
                    'status_order_id' => 1,
                    'metode_pembayaran' => $request->metode_pembayaran,
                    'ongkir' => $request->ongkir,
                    'no_hp' => $request->no_hp,
                    'pesan' => $request->pesan
                ]);
            }

            $order = DB::table('order')->where('invoice', $request->invoice)->first();

            $barang = DB::table('keranjang')->where('users_id', $user_id)->get();

            //lalu memasukkan barang yang dibeli kedalam table detail order
            foreach ($barang as $brg) {
                DetailOrder::create([
                    'order_id' => $order->id,
                    'food_id' => $brg->foods_id,
                    'quantity' => $brg->quantity
                ]);
            }

            //menghapus data di keranjang pembeli
            DB::table('keranjang')->where('users_id',$user_id)->delete();
            return redirect()->route('user.order.sukses');
        }else{
            return redirect()->route('user.keranjang');
        }

    }

    public function sukses()
    {
        //menampilkan halaman ketika order berhasil dilakukan

        $order = Order::all();

        return view('user.terimakasih',compact('order'));

    }

    public function pembayaran($id)
    {
        $data = array(
            'rekening' => Rekening::all(),
            'order' => Order::findOrFail($id)
        );

        return view('user.order.pembayaran', $data);

    }

    public function buktiPembayaran($id, Request $request)
    {
        //
        $order = Order::findOrFail($id);

        if ($request->file('bukti_pembayaran')) {
            $file = $request->file('bukti_pembayaran')->store('buktibayar', 'public');

            $order->bukti_pembayaran = $file;
            $order->status_order_id = 2;

            $order->save();
        }

        return redirect()->route('user.order');

    }

    public function pesananditerima($id)
    {
        //
        $order = Order::findOrFail($id);
        $order->status_order_id = 5;
        $order->save();

        return redirect()->route('user.order');
    }

    public function dibatalkan($id)
    {
        //
        $order = Order::findOrFail($id);
        $order->status_order_id = 6;
        $order->save();

        return redirect()->route('user.order');
    }

    // public function indexMidtrans($id)
    // {
    //     $id = Order::findOrFail($id);

    //     $orders = Order::with('users','status_order')->get();

    //     // dd($order);
    //     return view('user.order.midtrans.index', compact('orders','id'));
    // }

    public function show(Order $order)
    {
        //

        $snapToken = $order->snap_token;
        if (is_null($snapToken)) {
            // Jika snap token masih NULL, buat token snap dan simpan ke database

            $midtrans = new CreateSnapTokenService($order);
            $snapToken = $midtrans->getSnapToken();

            $order->snap_token = $snapToken;
            $order->save();
        }
        // dd($snapToken, $order);
        return view('user.order.show', compact('order', 'snapToken'));
    }
}
