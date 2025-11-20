@extends('layouts.app')

@section('header', 'Edit Classification')

@section('content')
    <div class="max-w-3xl mx-auto">
        <div class="bg-white shadow-sm rounded-lg overflow-hidden border border-gray-200">
            <div class="px-6 py-5 border-b border-gray-200 bg-gray-50">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Edit Classification Details
                </h3>
                <p class="mt-1 text-sm text-gray-500">
                    Update the information for this classification.
                </p>
            </div>
            <div class="p-6">
                <form action="{{ route('admin.classifications.update', $classification) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="space-y-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <div class="mt-1">
                                <input type="text" name="name" id="name" value="{{ old('name', $classification->name) }}" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md p-2 border" required>
                            </div>
                            @error('name')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-8 flex justify-end space-x-3">
                        <a href="{{ route('admin.classifications.index') }}" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Cancel
                        </a>
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Update Classification
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
