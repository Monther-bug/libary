@extends('layouts.guest')

@section('content')
<div class="bg-gray-100 dark:bg-gray-900 min-h-screen py-12">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-8">Checkout</h1>

        @if(session('error'))
            <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        <div class="bg-white dark:bg-gray-800 shadow overflow-hidden sm:rounded-lg mb-6">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white">Order Summary</h3>
            </div>
            <div class="border-t border-gray-200 dark:border-gray-700">
                <dl>
                    @foreach($cartItems as $item)
                        <div class="bg-gray-50 dark:bg-gray-700 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-300">
                                {{ $item->book->title }} (x{{ $item->quantity }})
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-white sm:mt-0 sm:col-span-2">
                                {{ number_format($item->book->price * $item->quantity, 2) }}
                            </dd>
                        </div>
                    @endforeach
                    <div class="bg-white dark:bg-gray-800 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-base font-bold text-gray-900 dark:text-white">Total</dt>
                        <dd class="mt-1 text-base font-bold text-indigo-600 dark:text-indigo-400 sm:mt-0 sm:col-span-2">
                            {{ number_format($total, 2) }}
                        </dd>
                    </div>
                </dl>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white mb-4">Delivery Details</h3>
                <form action="{{ route('user.orders.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 gap-6">
                        <div>
                            <label for="phone_number" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Phone Number</label>
                            <input type="text" name="phone_number" id="phone_number" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        </div>

                        <div>
                            <label for="location" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Delivery Location</label>
                            <input type="text" name="location" id="location" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        </div>

                        <div>
                            <label for="note" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Note (Optional)</label>
                            <textarea name="note" id="note" rows="3" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white"></textarea>
                        </div>
                    </div>

                    <div class="mt-6">
                        <button type="submit" class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Place Order
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
