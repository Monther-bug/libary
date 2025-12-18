<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->with('items.book')->orderBy('created_at', 'desc')->get();
        return view('user.orders.index', compact('orders'));
    }

    public function create()
    {
        $cartItems = Cart::with('book')->where('user_id', Auth::id())->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('user.cart.index')->with('error', 'Your cart is empty.');
        }

        $total = $cartItems->sum(function ($item) {
            return $item->book->price * $item->quantity;
        });

        return view('user.orders.checkout', compact('cartItems', 'total'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'phone_number' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'note' => 'nullable|string',
        ]);

        $user = Auth::user();
        $cartItems = Cart::with('book')->where('user_id', $user->id)->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('user.cart.index')->with('error', 'Your cart is empty.');
        }

        $total = 0;
        foreach ($cartItems as $item) {
            if ($item->book->quantityStock < $item->quantity) {
                 return back()->with('error', 'Not enough stock for ' . $item->book->title);
            }
            $total += $item->book->price * $item->quantity;
        }

        DB::beginTransaction();

        try {
            
            $order = Order::create([
                'user_id' => $user->id,
                'phone_number' => $request->phone_number,
                'location' => $request->location,
                'total' => $total,
                'note' => $request->note,
                'status' => 'pending',
            ]);

            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'book_id' => $item->book_id,
                    'quantity' => $item->quantity,
                ]);

                $item->book->decrement('quantityStock', $item->quantity);
            }

            Cart::where('user_id', $user->id)->delete();

            DB::commit();

            return redirect()->route('user.home')->with('success', 'Order placed successfully!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }
}
