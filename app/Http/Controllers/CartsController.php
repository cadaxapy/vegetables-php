<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
class CartsController extends Controller
{
    public function index()
    {
        $carts = Cart::all();
        return view('carts.index', compact('carts'));
    }
    public function update(Cart $cart)
    {
        $data = request()->validate([
            'count' => 'required',
        ]);
        $cart->update($data);
        return response('Success', 200);
    }
    public function store()
    {
        $data = request()->validate([
            'count' => 'required',
            'vegetable_id' => 'required',
        ]);
        Cart::create($data);
        return response('Success', 200);
    }
    public function delete(Cart $cart)
    {
        $cart->delete();
        return response('Success', 200);
    }
}
