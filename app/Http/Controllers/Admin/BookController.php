<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $query = Book::with('type');

        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('author', 'like', "%{$search}%");
            });
        }

        $books = $query->get();
        return view('admin.books.index', compact('books'));
    }

    public function create()
    {
        $types = Type::all();
        return view('admin.books.create', compact('types'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publication_date' => 'nullable|date', // Changed to nullable as it wasn't in migration
            'status' => 'nullable|in:available,borrowed', // Changed to nullable
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'type_id' => 'required|exists:types,id',
            'price' => 'required|numeric',
            'quantityStock' => 'required|integer',
            'publisher' => 'required|string',
            'description' => 'required|string',
        ]);

        if ($request->hasFile('picture')) {
            $validated['picture'] = $request->file('picture')->store('pictures', 'public');
        }

        Book::create($validated);

        return redirect()->route('admin.books.index')->with('success', 'Book created successfully.');
    }

    public function edit(Book $book)
    {
        $types = Type::all();
        return view('admin.books.edit', compact('book', 'types'));
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publication_date' => 'nullable|date',
            'status' => 'nullable|in:available,borrowed',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'type_id' => 'required|exists:types,id',
            'price' => 'required|numeric',
            'quantityStock' => 'required|integer',
            'publisher' => 'required|string',
            'description' => 'required|string',
        ]);

        if ($request->hasFile('picture')) {
            if ($book->picture) {
                Storage::disk('public')->delete($book->picture);
            }
            $validated['picture'] = $request->file('picture')->store('pictures', 'public');
        }

        $book->update($validated);

        return redirect()->route('admin.books.index')->with('success', 'Book updated successfully.');
    }

    public function destroy(Book $book)
    {
        if ($book->picture) {
            Storage::disk('public')->delete($book->picture);
        }
        $book->delete();
        return redirect()->route('admin.books.index')->with('success', 'Book deleted successfully.');
    }
}
