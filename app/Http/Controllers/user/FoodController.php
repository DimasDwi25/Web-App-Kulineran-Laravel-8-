<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use Illuminate\Http\Request;

use App\Models\Food;
use Illuminate\Support\Facades\DB;

class FoodController extends Controller
{
    //
    public function index(Request $request)
    {
        //
        /* It's a query to get the number of foods in each category. */
        // return $request->all();
        $item = DB::table('categories')
                ->join('foods', 'foods.categories_id', '=', 'categories.id')
                ->select(DB::raw('count(foods.categories_id) as jumlah, categories.*'))
                ->groupBy('categories.id','categories.name','categories.created_at','categories.updated_at')
                ->get();

        

        //filter by price
        // $food->when($request->price,function($query) use ($request) {
        //     return $query->where('price', '<=', $request->price);
        // });

        // //filter by kategori
        // $food->with('categories')->when($request->categories_id,function($query) use ($request) {
        //     return $query->where('categories_id', '=', $request->categories_id);
        // });

        // $food->where(function($query) use ($request) {
        //     $query->where('categories_id', '=', $request->categories_id)
        //     ->whereBetween('price', [$request->min_price, $request->max_price]);
        // })->orWhere(function($query) use ($request) {
        //     $query->where('categories_id', '=', $request->categories_id)
        //     ->where('price', '<=', $request->max_price);
        // });

        //filter by name
        // $food->where(function ($query) use ($request) {
        //     $query->where('name', 'like', '%'. $request->name);
        // });

        $data = array(
            'food' => Food::paginate(9),
            'categories' => $item
        );

        return view('user.foods', $data);

    }

    public function detail($id)
    {
        //
        $foods = Food::FindOrFail($id);

        return view('user.foodDetail', compact('foods'));
    }

    public function filter($id)
    {
        $cekId = Categorie::findOrFail($id);

        $categories = Categorie::join('foods', 'foods.categories_id', '=', 'categories.id')
                    ->select(DB::raw('count(foods.categories_id) as jumlah, categories.*'))
                    ->groupBy('categories.id','categories.name','categories.created_at','categories.updated_at')
                    ->get();

        $item = Food::with('categories')->where('categories_id',$id)->paginate(9);

        return view('user.filter',compact('item','cekId','categories'));
    }
}
