<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Keranjang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KeranjangController extends Controller
{
    //
    public function index()
    {
        //
        $id_user = Auth::user()->id;
        $keranjangs = DB::table('keranjang')
                        ->join('users', 'users.id', '=', 'keranjang.users_id')
                        ->join('foods', 'foods.id', '=', 'keranjang.foods_id')
                        ->select('foods.name as nama_produk', 'foods.gambar', 'users.name', 'keranjang.*', 'foods.price')
                        ->where('keranjang.users_id', '=', $id_user)
                        ->get();
        $cek_alamat = DB::table('alamat')->where('users_id',$id_user)->count();
        $data = [
            'keranjangs' => $keranjangs,
            'cek_alamat' => $cek_alamat
        ];

        return view('user.keranjang', $data);
    }

    public function simpan(Request $request)
    {
        //
        Keranjang::create([
            'users_id' => $request->users_id,
            'foods_id' => $request->foods_id,
            'quantity' => $request->quantity
        ]);

        return redirect()->route('user.keranjang');
    }

    public function update(Request $request)
    {
        //
        $index = 0;
        foreach($request->id as $id){
            $keranjang = Keranjang::findOrFail($id);
            $keranjang->quantity = $request->quantity[$index];
            $keranjang->save();
            $index++;
        }

        return redirect()->route('user.keranjang');
    }

    public function destroy($id)
    {
        //
        Keranjang::destroy($id);

        return redirect()->route('user.keranjang');
    }
}
