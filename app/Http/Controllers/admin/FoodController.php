<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Food;
use App\Models\Categorie;

use Illuminate\Support\Facades\Storage;


class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $foods = Food::with('categories')->get();

        return view('admin.foods.index', compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = array(
            'categories' => Categorie::all(),
        );

        return view('admin.foods.tambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //menyimpan produk ke database
        if($request->file('gambar')){
            //menyimpan foto ke dalam public/storage/imageproduct
            $file = $request->file('gambar')->store('imageproduct', 'public');

            Food::create([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'categories_id' => $request->categories_id,
                'gambar' => $file
            ]);

            return redirect()->route('admin.foods')->with('status', 'Berhasil menambahkan produk');
        }
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

        $data = array(
            'foods' => Food::findOrFail($id),
            'categories' => Categorie::all(),
        );

        return view('admin.foods.edit', $data);
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
        $foods = Food::findOrFail($id);

        if( $request->file('gambar')) {
            Storage::delete('public/'. $foods->gambar);
            $file = $request->file('gambar')->store('imageproduct', 'public');
            $foods->gambar = $file;
        }

        $foods->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'categories_id' => $request->categories_id,
        ]);

        $foods->save();

        return redirect()->route('admin.foods')->with('status', 'Berhasil mengubah produk');
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

        Food::destroy($id);
        return redirect()->route('admin.foods')->with('status', 'Berhasil menghapus produk');
    }
}
