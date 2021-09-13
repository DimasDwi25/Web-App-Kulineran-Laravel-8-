<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\DetailOrder;

use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    //
    public function index()
    {
        //
        $user_id = Order::with('users')->get();
        $order = Order::with('status_order')->where('order.status_order_id', 1)->get();

        return view('admin.transaksi.index')->with([
            'order' => $order,
            'user_id' => $user_id
        ]);
    }

    public function details($id)
    {
        //ambil data detail order sesuai id
        $detail_order = DB::table('details_order')
                            ->join('foods','foods.id','=','details_order.food_id')
                            ->join('order','order.id','=','details_order.order_id')
                            ->select('foods.name as nama_produk','foods.gambar','details_order.*','foods.price','order.*')
                            ->where('details_order.order_id',$id)
                            ->get();
        $order = DB::table('order')
                    ->join('users','users.id','=','order.users_id')
                    ->join('status_order','status_order.id','=','order.status_order_id')
                    ->select('order.*','users.name as nama_pelanggan','status_order.name as status')
                    ->where('order.id',$id)
                    ->first();
        $data = array(
            'detail' => $detail_order,
            'order'  => $order
        );
        return view('admin.transaksi.detail',$data);
    }

    public function perludicek()
    {
        //
        $user_id = Order::with('users')->get();
        $order = Order::with('status_order')->where('order.status_order_id', 2)->get();

        return view('admin.transaksi.perludicek')->with([
            'order' => $order,
            'user_id' => $user_id
        ]);
    }

    public function perludikirim()
    {
        //
        $user_id = Order::with('users')->get();
        $order = Order::with('status_order')->where('order.status_order_id', 3)->get();

        return view('admin.transaksi.perludikirim')->with([
            'order' => $order,
            'user_id' => $user_id
        ]);
    }

    public function dikirim()
    {
        //
        $user_id = Order::with('users')->get();
        $order = Order::with('status_order')->where('order.status_order_id', 4)->get();

        return view('admin.transaksi.dikirim')->with([
            'order' => $order,
            'user_id' => $user_id
        ]);
    }

    public function selesai()
    {
        //
        $user_id = Order::with('users')->get();
        $order = Order::with('status_order')->where('order.status_order_id', 5)->get();

        return view('admin.transaksi.selesai')->with([
            'order' => $order,
            'user_id' => $user_id
        ]);
    }

    public function dibatalkan()
    {
        //
        $user_id = Order::with('users')->get();
        $order = Order::with('status_order')->where('order.status_order_id', 6)->get();

        return view('admin.transaksi.dibatalkan')->with([
            'order' => $order,
            'user_id' => $user_id
        ]);
    }

    public function konfirmasi($id)
    {
        //function ini berfungsi menampilkan produk ketika user sudah melakukan pembayaran
        $order =Order::findOrFail($id);
        $order->status_order_id = 3;
        $order->save();

        return redirect()->route('admin.transaksi.perludikirim')->with('status', 'berhasil mengkonfirmasi pembayaran');
    }

    public function inputresi($id, Request $request)
    {
        //function untuk menginput resi pesanan
        $order = Order::findOrFail($id);
        $order->no_resi = $request->no_resi;
        $order->status_order_id = 4;
        $order->save();

        return redirect()->route('admin.transaksi.perludikirim')->with('status', 'berhasil menginput nomor resi');

    }
}
