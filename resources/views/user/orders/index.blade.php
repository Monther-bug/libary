@extends('layouts.guest')

@section('content')
<div class="bg-gray-100 dark:bg-gray-900 min-h-screen py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-8">My Orders</h1>

        @if($orders->isEmpty())
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 text-center">
                <p class="text-gray-500 dark:text-gray-400 mb-4">You haven't placed any orders yet.</p>
                <a href="{{ route('user.home') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Browse Books
                </a>
            </div>
        @else
            <div class="space-y-6">
                @foreach($orders as $order)
                    <div class="bg-white dark:bg-gray-800 shadow overflow-hidden sm:rounded-lg">
                        <div class="px-4 py-5 sm:px-6 flex justify-between items-center bg-gray-50 dark:bg-gray-700">
                            <div>
                                <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white">
                                    Order #{{ $order->id }}
                                </h3>
                                <p class="mt-1 max-w-2xl text-sm text-gray-500 dark:text-gray-300">
                                    Placed on {{ $order->created_at->format('M d, Y') }}
                                </p>
                            </div>
                            <div class="text-right">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    {{ $order->status === 'completed' ? 'bg-green-100 text-green-800' : 
                                       ($order->status === 'cancelled' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                                <p class="mt-1 text-lg font-bold text-gray-900 dark:text-white">
                                    {{ number_format($order->total, 2) }}
                                </p>
                            </div>
                        </div>
                        <div class="border-t border-gray-200 dark:border-gray-600">
                            <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach($order->items as $item)
                                    <li class="px-4 py-4 flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            @if($item->book->image_url)
                                                <img class="h-10 w-10 rounded-full object-cover" src="{{ $item->book->image_url }}" alt="{{ $item->book->title }}">
                                            @else
                                                 <div class="h-10 w-10 rounded-full bg-gray-200 dark:bg-gray-600 flex items-center justify-center text-gray-500 dark:text-gray-300">
                                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="ml-4 flex-1">
                                            <div class="flex justify-between">
                                                <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $item->book->title }}</p>
                                                <p class="text-sm text-gray-500 dark:text-gray-400">Qty: {{ $item->quantity }}</p>
                                            </div>
                                            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $item->book->author }}</p>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection
