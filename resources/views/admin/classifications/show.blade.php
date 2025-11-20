@extends('layouts.app')

@section('header', 'Classification Details')

@section('content')
    <div class="max-w-3xl mx-auto">
        <div class="bg-white shadow-sm rounded-lg overflow-hidden border border-gray-200">
            <div class="px-6 py-5 border-b border-gray-200 flex justify-between items-center bg-gray-50">
                <div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Classification Information
                    </h3>
                    <p class="mt-1 text-sm text-gray-500">
                        Details about the classification.
                    </p>
                </div>
                <a href="{{ route('admin.classifications.index') }}" class="text-indigo-600 hover:text-indigo-900 font-medium text-sm">
                    &larr; Back to List
                </a>
            </div>
            <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
                <dl class="sm:divide-y sm:divide-gray-200">
                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 hover:bg-gray-50 transition-colors duration-150">
                        <dt class="text-sm font-medium text-gray-500">
                            ID
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $classification->id }}
                        </dd>
                    </div>
                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 hover:bg-gray-50 transition-colors duration-150">
                        <dt class="text-sm font-medium text-gray-500">
                            Name
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 font-semibold">
                            {{ $classification->name }}
                        </dd>
                    </div>
                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 hover:bg-gray-50 transition-colors duration-150">
                        <dt class="text-sm font-medium text-gray-500">
                            Created At
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $classification->created_at->format('F j, Y, g:i a') }}
                        </dd>
                    </div>
                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 hover:bg-gray-50 transition-colors duration-150">
                        <dt class="text-sm font-medium text-gray-500">
                            Updated At
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $classification->updated_at->format('F j, Y, g:i a') }}
                        </dd>
                    </div>
                </dl>
            </div>
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-end space-x-3">
                <a href="{{ route('admin.classifications.edit', $classification) }}" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Edit
                </a>
                <form action="{{ route('admin.classifications.destroy', $classification) }}" method="POST" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500" onclick="return confirm('Are you sure you want to delete this classification?')">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
