<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\Food;

class WelcomeController extends Controller
{
    //
    public function index()
    {
        //
        $item = DB::table('foods')->limit(10)->get();

        return view('user.welcome', compact('item'));
    }

    public function kontak()
    {
        //
        return view('user.kontak');
    }
}
