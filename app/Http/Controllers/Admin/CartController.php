<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::with('user')->get();
        return view('admin.carts.index', compact('carts'));
    }

    public function create()
    {
        // Not applicable for carts in this context
    }

    public function store(Request $request)
    {
        // Not applicable for carts in this context
    }

    public function show(Cart $cart)
    {
        // May not be needed, but can be implemented for detail view
    }

    public function edit(Cart $cart)
    {
        // Not applicable for carts in this context
    }

    public function update(Request $request, Cart $cart)
    {
        // Not applicable for carts in this context
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();
        return redirect()->route('admin.carts.index')->with('success', 'Cart deleted successfully.');
    }
}
