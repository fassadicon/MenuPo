<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Guardian;
use App\Models\Philfct;
use App\Models\Student;
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

  public function getParent(Request $request)
  {
    $query = $request->get('query');
    $id = Guardian::where('firstName', 'LIKE', '%' . $query . '%')->pluck('id');
    $firstName = Guardian::where('firstName', 'LIKE', '%' . $query . '%')->pluck('firstName');
    $middleName = Guardian::where('firstName', 'LIKE', '%' . $query . '%')->pluck('middleName');
    $lastName = Guardian::where('firstName', 'LIKE', '%' . $query . '%')->pluck('lastName');
    $length = count($firstName);
    $fullName = array();
    for ($i = 0; $i < $length; $i++) {
      $fullName[$i] = $firstName[$i] . ' ' . $middleName[$i] . ' ' . $lastName[$i] . ' ID:' . $id[$i];
    }
    return response()->json($fullName);
  }
}
