@extends('layouts.app')

@section('header', 'Edit Book')

@section('content')
    <div class="max-w-3xl mx-auto">
        <div class="bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 shadow-xl rounded-2xl p-8">
            <form action="{{ route('admin.books.update', $book) }}" method="POST" enctype="multipart/form-data"
                class="space-y-6">
                @csrf
                @method('PUT')

                @if ($errors->any())
                    <div class="mb-6 rounded-xl bg-red-500/10 p-4 border border-red-500/20 shadow-lg shadow-red-500/5">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-red-600 dark:text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-red-800 dark:text-red-200">
                                    There were errors with your submission
                                </h3>
                                <div class="mt-2 text-sm text-red-700 dark:text-red-300">
                                    <ul class="list-disc pl-5 space-y-1">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2"
                            for="title">Title</label>
                        <input
                            class="w-full bg-white dark:bg-slate-900 border @error('title') border-red-500 @else border-slate-200 dark:border-slate-700 @enderror rounded-xl px-4 py-2.5 text-slate-900 dark:text-white focus:ring-2 focus:ring-violet-500/50 focus:border-violet-500 outline-none transition-all placeholder-slate-400 dark:placeholder-slate-500"
                            id="title" name="title" type="text" value="{{ old('title', $book->title) }}" required>
                        @error('title')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2"
                            for="author">Author</label>
                        <input
                            class="w-full bg-white dark:bg-slate-900 border @error('author') border-red-500 @else border-slate-200 dark:border-slate-700 @enderror rounded-xl px-4 py-2.5 text-slate-900 dark:text-white focus:ring-2 focus:ring-violet-500/50 focus:border-violet-500 outline-none transition-all placeholder-slate-400 dark:placeholder-slate-500"
                            id="author" name="author" type="text" value="{{ old('author', $book->author) }}" required>
                        @error('author')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2"
                            for="publication_date">Publication Date</label>
                        <input
                            class="w-full bg-white dark:bg-slate-900 border @error('publication_date') border-red-500 @else border-slate-200 dark:border-slate-700 @enderror rounded-xl px-4 py-2.5 text-slate-900 dark:text-white focus:ring-2 focus:ring-violet-500/50 focus:border-violet-500 outline-none transition-all placeholder-slate-400 dark:placeholder-slate-500"
                            id="publication_date" name="publication_date" type="date" value="{{ old('publication_date', $book->publication_date) }}">
                        @error('publication_date')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2"
                            for="status">Status</label>
                        <div class="relative">
                            <select
                                class="w-full bg-white dark:bg-slate-900 border @error('status') border-red-500 @else border-slate-200 dark:border-slate-700 @enderror rounded-xl px-4 py-2.5 text-slate-900 dark:text-white focus:ring-2 focus:ring-violet-500/50 focus:border-violet-500 outline-none transition-all appearance-none"
                                id="status" name="status">
                                <option value="available" {{ old('status', $book->status) == 'available' ? 'selected' : '' }}>Available</option>
                                <option value="borrowed" {{ old('status', $book->status) == 'borrowed' ? 'selected' : '' }}>Borrowed</option>
                            </select>
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-slate-400">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </div>
                        @error('status')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2"
                            for="type_id">Type</label>
                        <div class="relative">
                            <select
                                class="w-full bg-white dark:bg-slate-900 border @error('type_id') border-red-500 @else border-slate-200 dark:border-slate-700 @enderror rounded-xl px-4 py-2.5 text-slate-900 dark:text-white focus:ring-2 focus:ring-violet-500/50 focus:border-violet-500 outline-none transition-all appearance-none"
                                id="type_id" name="type_id" required>
                                <option value="">Select Type</option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}" {{ old('type_id', $book->type_id) == $type->id ? 'selected' : '' }}>
                                        {{ $type->name }}
                                    </option>
                                @endforeach
                            </select>
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-slate-400">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </div>
                        @error('type_id')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2"
                            for="price">Price</label>
                        <input
                            class="w-full bg-white dark:bg-slate-900 border @error('price') border-red-500 @else border-slate-200 dark:border-slate-700 @enderror rounded-xl px-4 py-2.5 text-slate-900 dark:text-white focus:ring-2 focus:ring-violet-500/50 focus:border-violet-500 outline-none transition-all placeholder-slate-400 dark:placeholder-slate-500"
                            id="price" name="price" type="number" step="0.01" value="{{ old('price', $book->price) }}" required placeholder="0.00">
                        @error('price')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2"
                            for="quantityStock">Quantity in Stock</label>
                        <input
                            class="w-full bg-white dark:bg-slate-900 border @error('quantityStock') border-red-500 @else border-slate-200 dark:border-slate-700 @enderror rounded-xl px-4 py-2.5 text-slate-900 dark:text-white focus:ring-2 focus:ring-violet-500/50 focus:border-violet-500 outline-none transition-all placeholder-slate-400 dark:placeholder-slate-500"
                            id="quantityStock" name="quantityStock" type="number" value="{{ old('quantityStock', $book->quantityStock) }}" required placeholder="0">
                        @error('quantityStock')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2"
                            for="publisher">Publisher</label>
                        <input
                            class="w-full bg-white dark:bg-slate-900 border @error('publisher') border-red-500 @else border-slate-200 dark:border-slate-700 @enderror rounded-xl px-4 py-2.5 text-slate-900 dark:text-white focus:ring-2 focus:ring-violet-500/50 focus:border-violet-500 outline-none transition-all placeholder-slate-400 dark:placeholder-slate-500"
                            id="publisher" name="publisher" type="text" value="{{ old('publisher', $book->publisher) }}" required placeholder="Publisher name">
                        @error('publisher')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2"
                            for="description">Description</label>
                        <textarea
                            class="w-full bg-white dark:bg-slate-900 border @error('description') border-red-500 @else border-slate-200 dark:border-slate-700 @enderror rounded-xl px-4 py-2.5 text-slate-900 dark:text-white focus:ring-2 focus:ring-violet-500/50 focus:border-violet-500 outline-none transition-all placeholder-slate-400 dark:placeholder-slate-500"
                            id="description" name="description" rows="4" required placeholder="Book description">{{ old('description', $book->description) }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-2" x-data="{ preview: '{{ $book->picture ? asset('storage/' . $book->picture) : null }}' }">
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2"
                            for="picture">Picture</label>
                        <div class="flex items-center justify-center w-full">
                            <label for="picture"
                                class="flex flex-col items-center justify-center w-full h-64 border-2 border-dashed @error('picture') border-red-500 @else border-slate-300 dark:border-slate-700 @enderror rounded-xl cursor-pointer bg-white dark:bg-slate-900 hover:bg-slate-50 dark:hover:bg-slate-800 hover:border-violet-500 dark:hover:border-violet-500/50 transition-all group relative overflow-hidden">
                                
                                <!-- Default State -->
                                <div class="flex flex-col items-center justify-center pt-5 pb-6" x-show="!preview">
                                    <svg class="w-8 h-8 mb-3 text-slate-400 group-hover:text-violet-400 transition-colors"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                    </svg>
                                    <p class="text-sm text-slate-400 group-hover:text-slate-300">Click to upload or drag and
                                        drop</p>
                                </div>

                                <!-- Preview State -->
                                <div class="absolute inset-0 flex items-center justify-center" x-show="preview" style="display: none;">
                                    <img :src="preview" class="h-full w-full object-contain p-2">
                                    <div class="absolute inset-0 bg-black/50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                        <p class="text-white font-medium">Click to change</p>
                                    </div>
                                </div>

                                <input id="picture" name="picture" type="file" class="hidden" accept="image/*"
                                    @change="preview = URL.createObjectURL($event.target.files[0])" />
                            </label>
                        </div>
                        @error('picture')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex items-center justify-end gap-4 pt-4 border-t border-white/5">
                    <a href="{{ route('admin.books.index') }}"
                        class="px-6 py-2.5 rounded-xl text-sm font-medium text-slate-300 hover:text-white hover:bg-white/5 transition-all">
                        Cancel
                    </a>
                    <button
                        class="px-6 py-2.5 rounded-xl bg-violet-600 text-white text-sm font-medium hover:bg-violet-500 focus:ring-4 focus:ring-violet-500/20 transition-all shadow-lg shadow-violet-500/20"
                        type="submit">
                        Update Book
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection