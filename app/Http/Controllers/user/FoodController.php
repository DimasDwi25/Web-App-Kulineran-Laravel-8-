<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Food;
use Illuminate\Support\Facades\DB;

class FoodController extends Controller
{
    //
    public function index()
    {
        //
        $item = DB::table('categories')
                ->join('foods', 'foods.categories_id', '=', 'categories.id')
                ->select(DB::raw('count(foods.categories_id) as jumlah, categories.*'))
                ->groupBy('categories.id','categories.name','categories.created_at','categories.updated_at')
                ->get();

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
}
