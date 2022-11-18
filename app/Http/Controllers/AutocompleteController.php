<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Philfct;
use Illuminate\Http\Request;

class AutocompleteController extends Controller
{
  public function index()
  {
    return view('autocomplete');
  }

  public function autocompleteSearch(Request $request)
  {
    $query = $request->get('query');
    $filterResult = Philfct::where('name', 'LIKE', '%' . $query . '%')->get();
    return response()->json($filterResult);
  }

  public function autocompleteSearchFoods(Request $request)
  {
    $query = $request->get('query');
    //   $filterResult = Menu::whereDate('displayed_at', '<', Carbon::now()->format('Y-m-d'))


    $filterResult = Food::where('name', 'LIKE', '%' . $query . '%')->get();
    return response()->json($filterResult);
  }

  public function getPhilFCTFood($name)
  {
    $philfct = Philfct::where('name', $name)->first();
    return response()->json(['food' => $philfct]);
  }
  // public function checkPhilFCTitem($name) {
  //     return Philfct::findOrFail($name);
  // }
}
