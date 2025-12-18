// 1. Create a test user and book
$user = App\Models\User::factory()->create();
$book = App\Models\Book::first();
$originalStock = $book->quantityStock;

// 2. Add item to cart
App\Models\Cart::create(['user_id' => $user->id, 'book_id' => $book->id, 'quantity' => 1]);

// 3. Simulate functionality of OrderController::store
// ... (Simplified logic for verification)
if ($book->quantityStock >= 1) {
    $order = App\Models\Order::create([
        'user_id' => $user->id,
        'phone_number' => '1234567890',
        'location' => 'Test Location',
        'total' => $book->price,
        'status' => 'pending'
    ]);
    
    App\Models\OrderItem::create([
        'order_id' => $order->id,
        'book_id' => $book->id,
        'quantity' => 1
    ]);
    
    $book->decrement('quantityStock', 1);
    App\Models\Cart::where('user_id', $user->id)->delete();
}

// 4. Verify results
$finalStock = $book->refresh()->quantityStock;
$orderCreated = App\Models\Order::where('user_id', $user->id)->exists();
$cartEmpty = App\Models\Cart::where('user_id', $user->id)->doesntExist();

dump([
    'Original Stock' => $originalStock,
    'Final Stock' => $finalStock,
    'Stock Deducted' => $originalStock - $finalStock === 1,
    'Order Created' => $orderCreated,
    'Cart Empty' => $cartEmpty
]);
