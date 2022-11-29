<?php

namespace App\Http\Controllers\User;

use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;

class POSController extends Controller
{
    public function index(){

        $notifications = DB::select('SELECT * FROM notifications WHERE status = ? && user_id = ? ORDER BY created_at DESC', [1, auth()->user()->id]);
        $students = DB::select('SELECT * FROM students WHERE parent_id = ?', [auth()->user()->id]);

        return view('users.pos', [
            'foods' => Food::all(),
            'notifs' => $notifications,
            'students' => $students
        ]);
    }

    public function addtocart(Request $request){

        $food_id = $request->input('food-id');

        $item = Food::findOrFail($food_id);
        $rice = Food::findOrFail(13);

        if($item->type == 3){
            Cart::add(
                $item->id,
                $item->name,
                1,
                $item->price,
                0,
                ['image' => $item->image,
                'type' => $item->type
                ]
            );
    
            Cart::add(
                $rice->id,
                $rice->name,
                1,
                $rice->price,
                0,
                ['image' => $rice->image,
                'type' => $rice->type
                ]
            );
        }
        else{
            Cart::add(
                $item->id,
                $item->name,
                1,
                $item->price,
                0,
                ['image' => $item->image,
                'type' => $item->type
                ]
            );
        }

        return response()->json(['status' => 'Success']);
    }

    public function add(Request $request){

        $food_id = $request->input('food-id');

        $item = Food::findOrFail($food_id);
        $rice = Food::findOrFail(13);

        if($item->type == 3){
            Cart::add(
                $item->id,
                $item->name,
                1,
                $item->price,
                0,
                ['image' => $item->image,
                'type' => $item->type
                ]
            );
    
            Cart::add(
                $rice->id,
                $rice->name,
                1,
                $rice->price,
                0,
                ['image' => $rice->image,
                'type' => $rice->type
                ]
            );
        }
        else{
            Cart::add(
                $item->id,
                $item->name,
                1,
                $item->price,
                0,
                ['image' => $item->image,
                'type' => $item->type
                ]
            );
        }

        return response()->json(['status' => 'Success']);
    }

    public function minus(Request $request){

        $food_id = $request->input('food-id');

        $item = Food::findOrFail($food_id);
        $rice = Food::findOrFail(13);
        $content = Cart::content();
        $rice_rowId = 0;

        foreach($content as $val){
            if($rice->id == $val->id){
                $rice_rowId = $val->rowId;
                $rice_qty = $val->qty;
            }
        }
        
        foreach($content as $val){
            if($item->id == $val->id && $item->type == 3){
                Cart::update($val->rowId, $val->qty-1);
                Cart::update($rice_rowId, $rice_qty-1);
            }
            elseif($item->id == $val->id && $item->type != 3){
                Cart::remove($val->rowId);
            }
        }

        return response()->json(['status' => 'Success']);
    }

    public function delete(Request $request){

        $food_id = $request->input('food-id');

        $item = Food::findOrFail($food_id);
        $content = Cart::content();
        $rice = Food::findOrFail(13);
        $rice_rowId = 0;
        $rice_qty = 0;

        foreach($content as $val){
            if($rice->id == $val->id){
                $rice_rowId = $val->rowId;
                $rice_qty = $val->qty;
            }
        }
        
        foreach($content as $val){
            if($item->id == $val->id && $item->type == 3){
                Cart::remove($val->rowId);
                Cart::update($rice_rowId, $rice_qty-$val->qty);
            }
            elseif($item->id == $val->id && $item->type != 3){
                Cart::remove($val->rowId);
            }
        }

        return response()->json(['status' => 'Success']);
        
    }
}
