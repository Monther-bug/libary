@extends('layouts.guest')

@section('content')
<div class="bg-gray-100 dark:bg-gray-900 min-h-screen py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-6">
            <a href="{{ route('user.home') }}" class="inline-flex items-center text-sm text-gray-500 dark:text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to Books
            </a>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden">
            <div class="md:flex">
                <div class="md:flex-shrink-0 md:w-1/3 bg-gray-200 dark:bg-gray-700">
                    @if($book->picture)
                        <img class="h-full w-full object-cover md:h-full md:w-full" src="{{ asset('storage/' . $book->picture) }}" alt="{{ $book->title }}">
                    @else
                        <div class="h-96 md:h-full w-full flex items-center justify-center bg-indigo-100 dark:bg-indigo-900 text-indigo-500 dark:text-indigo-300">
                            <svg class="h-32 w-32" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                    @endif
                </div>
                <div class="p-8 md:w-2/3 flex flex-col">
                    <div class="flex justify-between items-start">
                        <div>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800 dark:bg-indigo-900 dark:text-indigo-200 mb-4">
                                {{ $book->type->name ?? 'Book' }}
                            </span>
                            <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">{{ $book->title }}</h1>
                            <p class="text-xl text-gray-500 dark:text-gray-400 mb-4">by {{ $book->author }}</p>
                        </div>
                        <div class="text-right">
                            <p class="text-3xl font-bold text-indigo-600 dark:text-indigo-400">{{ number_format($book->price, 2) }}</p>
                            <p class="text-sm {{ $book->quantityStock > 0 ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400' }} mt-1">
                                {{ $book->quantityStock > 0 ? 'In Stock (' . $book->quantityStock . ' available)' : 'Out of Stock' }}
                            </p>
                        </div>
                    </div>

                    <div class="prose dark:prose-invert max-w-none mb-8 flex-grow">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Description</h3>
                        <p class="text-gray-600 dark:text-gray-300 whitespace-pre-line">
                            {{ $book->description ?: 'No description available.' }}
                        </p>
                    </div>

                    <div class="border-t border-gray-200 dark:border-gray-700 pt-6 mt-auto">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">Publisher</h4>
                                <p class="text-base text-gray-900 dark:text-white">{{ $book->publisher ?: 'N/A' }}</p>
                            </div>
                            <!-- Add more details if available in DB -->
                        </div>
                        
                        <div class="mt-8">
                             <!-- Placeholder for Add to Cart or similar -->
                            <button type="button" class="w-full md:w-auto inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors {{ $book->quantityStock <= 0 ? 'opacity-50 cursor-not-allowed' : '' }}" {{ $book->quantityStock <= 0 ? 'disabled' : '' }}>
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
