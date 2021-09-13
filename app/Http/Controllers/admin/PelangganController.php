<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class PelangganController extends Controller
{
    //
    public function index()
    {
        //
        $data = array(
            'pelanggan' => DB::table('users')
                            ->join('alamat', 'alamat.users_id', '=', 'users.id')
                            ->select('users.*','alamat.alamat_detail')
                            ->where('users.role', '=', 'customer')
                            ->get()
        );

        return view('admin.pelanggan.index',$data);
    }
}
