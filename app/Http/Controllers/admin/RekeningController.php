<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Rekening;

class RekeningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $item = Rekening::all();

        return view('admin.rekening.index', compact('item'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.rekening.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        Rekening::create([
            'name' => $request->name,
            'nama_bank' => $request->nama_bank,
            'no_rekening' => $request->no_rekening
        ]);

        return redirect()->route('admin.rekening')->with('status', 'Berhasil menambahkan data rekening');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $item = Rekening::findOrFail($id);

        return view('admin.rekening.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $item = Rekening::findOrFail($id);

        $item->update([
            'name' => $request->name,
            'nama_bank' => $request->nama_bank,
            'no_rekening' => $request->no_rekening
        ]);

        $item->save();

        return redirect()->route('admin.rekening')->with('status', 'Berhasil mengganti rekening');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Rekening::destroy($id);

        return redirect()->route('admin.rekening')->with('status', 'Berhasil menghapus rekening');
    }
}
