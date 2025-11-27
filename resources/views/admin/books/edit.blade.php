@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">Edit Book</h1>

        <form action="{{ route('admin.books.update', $book) }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Name</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" id="name" name="name" type="text" value="{{ $book->name }}" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="author">Author</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" id="author" name="author" type="text" value="{{ $book->author }}" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="publication_date">Publication Date</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" id="publication_date" name="publication_date" type="date" value="{{ $book->publication_date }}" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="status">Status</label>
                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" id="status" name="status" required>
                    <option value="available" {{ $book->status == 'available' ? 'selected' : '' }}>Available</option>
                    <option value="borrowed" {{ $book->status == 'borrowed' ? 'selected' : '' }}>Borrowed</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="type_id">Type</label>
                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" id="type_id" name="type_id" required>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" {{ $book->type_id == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="picture">Picture</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" id="picture" name="picture" type="file">
                @if ($book->picture)
                    <img src="{{ asset('storage/' . $book->picture) }}" alt="{{ $book->name }}" class="h-20 w-20 mt-2">
                @endif
            </div>
            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">Update Book</button>
                <a href="{{ route('admin.books.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">Cancel</a>
            </div>
        </form>
    </div>
@endsection
