<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Classification;
use App\Models\Type;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'classifications' => Classification::count(),
            'types' => Type::count(),
            'books' => Book::count(),
            'carts' => Cart::count(),
            'categories' => Category::count(),
        ];

        $chartData = Type::withCount('books')->get();

        return view('admin.dashboard', compact('stats', 'chartData'));
    }
}
