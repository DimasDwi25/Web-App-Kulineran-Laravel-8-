<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Alamat;
use Illuminate\Support\Facades\Auth;

class AlamatController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $item = Alamat::all();

        return view('user.alamat', compact('item'));
    }

    public function simpan(Request $request)
    {
        //menyimpan alamat ke db
        Alamat::create([
            'users_id' => Auth::user()->id,
            'alamat_detail' => $request->alamat_detail,
        ]);

        return redirect()->route('user.alamat');
    }

    public function ubah($id)
    {
        //
        $item = Alamat::findOrFail($id);

        return view('user.ubahAlamat', compact('item'));
    }

    public function update(Request $request, $id)
    {
        //
        $item = Alamat::findOrFail($id);

        $item->update([
            'alamat_detail' => $request->alamat_detail,
        ]);

        $item->save();

        return redirect()->route('user.alamat');
    }
}
