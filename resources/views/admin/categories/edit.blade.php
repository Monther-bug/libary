@extends('layouts.app')

@section('header', 'Edit Category')

@section('content')
    <div class="max-w-3xl mx-auto">
        <div class="bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 shadow-xl rounded-2xl p-8">
            <form action="{{ route('admin.categories.update', $category) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2" for="name">
                        Name
                    </label>
                    <input
                        class="w-full bg-white dark:bg-slate-900 border border-slate-200 dark:border-white/10 rounded-xl px-4 py-2.5 text-slate-900 dark:text-white focus:ring-2 focus:ring-violet-500/50 focus:border-violet-500 outline-none transition-all placeholder-slate-400 dark:placeholder-slate-500"
                        id="name" name="name" type="text" placeholder="Category Name" value="{{ $category->name }}"
                        required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2"
                        for="classification_id">
                        Classification
                    </label>
                    <div class="relative">
                        <select
                            class="w-full bg-white/50 dark:bg-slate-900/50 border border-slate-200 dark:border-white/10 rounded-xl px-4 py-2.5 text-slate-900 dark:text-white focus:ring-2 focus:ring-violet-500/50 focus:border-violet-500 outline-none transition-all appearance-none"
                            id="classification_id" name="classification_id" required>
                            @foreach ($classifications as $classification)
                                <option value="{{ $classification->id }}" {{ $category->classification_id == $classification->id ? 'selected' : '' }}>{{ $classification->name }}</option>
                            @endforeach
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-slate-400">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-4 pt-4 border-t border-white/5">
                    <a href="{{ route('admin.categories.index') }}"
                        class="px-6 py-2.5 rounded-xl text-sm font-medium text-slate-300 hover:text-white hover:bg-white/5 transition-all">
                        Cancel
                    </a>
                    <button
                        class="px-6 py-2.5 rounded-xl bg-violet-600 text-white text-sm font-medium hover:bg-violet-500 focus:ring-4 focus:ring-violet-500/20 transition-all shadow-lg shadow-violet-500/20"
                        type="submit">
                        Update Category
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection