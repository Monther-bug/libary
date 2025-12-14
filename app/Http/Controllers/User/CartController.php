<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::with('book')->where('user_id', Auth::id())->get();
        return view('user.cart.index', compact('cartItems'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $book = Book::findOrFail($request->book_id);

        if ($book->quantityStock < $request->quantity) {
            return back()->with('error', 'Not enough stock available.');
        }

        $cartItem = Cart::where('user_id', Auth::id())
                        ->where('book_id', $request->book_id)
                        ->first();

        if ($cartItem) {
            $newQuantity = $cartItem->quantity + $request->quantity;
            if ($book->quantityStock < $newQuantity) {
                 return back()->with('error', 'Not enough stock available for the requested total quantity.');
            }
            $cartItem->increment('quantity', $request->quantity);
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'book_id' => $request->book_id,
                'quantity' => $request->quantity,
            ]);
        }

        return redirect()->route('user.cart.index')->with('success', 'Book added to cart successfully!');
    }
    

    public function destroy(Cart $cart)
    {
        if ($cart->user_id !== Auth::id()) {
            abort(403);
        }

        $cart->delete();

        return back()->with('success', 'Item removed from cart.');
    }
}
