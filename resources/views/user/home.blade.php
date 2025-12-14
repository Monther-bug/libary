@extends('layouts.guest')

@section('content')
<div class="bg-gray-100 dark:bg-gray-900 min-h-screen py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-4 md:mb-0">
                Library Books
            </h1>
            
            <!-- Search Form -->
            <form action="{{ route('user.home') }}" method="GET" class="w-full md:w-1/3">
                <div class="relative">
                    <input type="text" name="search" value="{{ request('search') }}" 
                        class="w-full rounded-lg border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 focus:ring-indigo-500 focus:border-indigo-500 pl-10 pr-4 py-2"
                        placeholder="Search by title or author...">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>
            </form>
        </div>

        @if($books->isEmpty())
            <div class="text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">No books found</h3>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Try adjusting your search terms.</p>
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach($books as $book)
                    <a href="{{ route('user.books.show', $book) }}" class="group">
                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden transition-transform duration-300 transform group-hover:-translate-y-1 group-hover:shadow-xl h-full flex flex-col">
                            <div class="aspect-w-3 aspect-h-4 bg-gray-200 dark:bg-gray-700 relative overflow-hidden">
                                @if($book->image_url)
                                    <img src="{{ $book->image_url }}" alt="{{ $book->title }}" class="w-full h-64 object-cover">
                                @else
                                    <div class="w-full h-64 flex items-center justify-center bg-indigo-100 dark:bg-indigo-900 text-indigo-500 dark:text-indigo-300">
                                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                        </svg>
                                    </div>
                                @endif
                                <div class="absolute top-0 right-0 p-2">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $book->quantityStock > 0 ? 'bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-100' : 'bg-red-100 text-red-800 dark:bg-red-800 dark:text-red-100' }}">
                                        {{ $book->quantityStock > 0 ? 'In Stock' : 'Out of Stock' }}
                                    </span>
                                </div>
                            </div>
                            <div class="p-4 flex-1 flex flex-col">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-1 line-clamp-1" title="{{ $book->title }}">
                                    {{ $book->title }}
                                </h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400 mb-2">{{ $book->author }}</p>
                                <div class="mt-auto flex justify-between items-center">
                                    <span class="text-lg font-bold text-indigo-600 dark:text-indigo-400">
                                        {{ number_format($book->price, 2) }}
                                    </span>
                                    <span class="text-sm text-gray-500 dark:text-gray-400 bg-gray-100 dark:bg-gray-700 px-2 py-1 rounded">
                                        {{ $book->type->name ?? 'Book' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="mt-8">
                {{ $books->withQueryString()->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
