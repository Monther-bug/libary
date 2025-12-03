@extends('layouts.app')

@section('header', 'Create Classification')

@section('content')
    <div class="max-w-3xl mx-auto">
        <div class="bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 shadow-xl rounded-2xl p-8">
            <div class="mb-8 border-b border-slate-200 dark:border-white/5 pb-6">
                <h3 class="text-lg font-medium text-slate-900 dark:text-white">
                    New Classification Details
                </h3>
                <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">
                    Please fill in the information below to create a new classification.
                </p>
            </div>

            <form action="{{ route('admin.classifications.store') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2" for="name">
                        Name
                    </label>
                    <input
                        class="w-full bg-white dark:bg-slate-900 border border-slate-200 dark:border-white/10 rounded-xl px-4 py-2.5 text-slate-900 dark:text-white focus:ring-2 focus:ring-violet-500/50 focus:border-violet-500 outline-none transition-all placeholder-slate-400 dark:placeholder-slate-500"
                        id="name" name="name" type="text" placeholder="e.g. Science Fiction" required>
                    @error('name')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                    <p class="mt-2 text-sm text-slate-500">The name of the classification category.</p>
                </div>

                <div class="flex items-center justify-end gap-4 pt-4 border-t border-white/5">
                    <a href="{{ route('admin.classifications.index') }}"
                        class="px-6 py-2.5 rounded-xl text-sm font-medium text-slate-300 hover:text-white hover:bg-white/5 transition-all">
                        Cancel
                    </a>
                    <button
                        class="px-6 py-2.5 rounded-xl bg-violet-600 text-white text-sm font-medium hover:bg-violet-500 focus:ring-4 focus:ring-violet-500/20 transition-all shadow-lg shadow-violet-500/20"
                        type="submit">
                        Create Classification
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection