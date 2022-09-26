<?php

namespace App\Http\Controllers\Admin;

use App\Models\Food;
use Illuminate\Http\Request;

use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class FoodController extends Controller
{
    public function index() {
        return view('admin.FoodManagement.index');
    }

    public function create() {
        return view('admin.FoodManagement.createFood');
    }

    public function store(Request $request) {
        $formFields = $request->validate([
            //  'name' => ['required', Rule::unique('foods', 'name')],

            'name' => 'required',
             // viewVariableName => ['required OR etc.', Rule::unique(tableName, columnName), format e.g. 'email']
             // 'email' => ['required', 'email']
             'description' => 'required',
             'type' => 'required',
             'price' => 'required',
             'stock' => 'required',
            //  'stock' => 'required',
             // File
             
        ]);
 
        // 'logo' => ''
        // if($request->hasFile('image')) {
        //  $formFields['image'] = $request->file('logo')->store('Images/Food', 'public');
        // }
 
        $formFields['user_id'] = auth()->id();
 
        Food::create($formFields);
 
         // Session::flash('message', 'messageBody');
        // return redirect('/admin/foods')->with('message', 'Food created successfully!');
        return redirect('/admin/foods');
     }
}
