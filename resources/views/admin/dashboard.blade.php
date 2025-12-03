@extends('layouts.app')

@section('header', 'Dashboard')

@section('content')
    <!-- Stats Grid -->
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4 mb-8">
        <!-- Total Books -->
        <div
            class="bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 shadow-xl rounded-2xl p-6 relative overflow-hidden group hover:-translate-y-1 transition-all duration-300">
            <div
                class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-violet-500/10 rounded-full blur-xl group-hover:bg-violet-500/20 transition-all duration-500">
            </div>
            <div class="relative z-10">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-slate-500 dark:text-slate-400 text-sm font-medium">Total Books</h3>
                    <div class="p-2 bg-violet-500/10 rounded-lg text-violet-600 dark:text-violet-400">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                </div>
                <div class="flex items-baseline">
                    <p class="text-3xl font-bold text-slate-900 dark:text-white">{{ $stats['books'] }}</p>
                    <span class="ml-2 text-sm text-green-500 flex items-center">
                        <svg class="w-3 h-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                        +12%
                    </span>
                </div>
            </div>
        </div>

        <!-- Categories -->
        <div class="bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 shadow-xl rounded-2xl p-6 relative overflow-hidden group hover:-translate-y-1 transition-all duration-300"
            style="animation-delay: 0.1s;">
            <div
                class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-fuchsia-500/10 rounded-full blur-xl group-hover:bg-fuchsia-500/20 transition-all duration-500">
            </div>
            <div class="relative z-10">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-slate-500 dark:text-slate-400 text-sm font-medium">Categories</h3>
                    <div class="p-2 bg-fuchsia-500/10 rounded-lg text-fuchsia-600 dark:text-fuchsia-400">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                        </svg>
                    </div>
                </div>
                <div class="flex items-baseline">
                    <p class="text-3xl font-bold text-slate-900 dark:text-white">{{ $stats['categories'] }}</p>
                    <span class="ml-2 text-sm text-green-500 flex items-center">
                        <svg class="w-3 h-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                        +5%
                    </span>
                </div>
            </div>
        </div>

        <!-- Classifications -->
        <div class="bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 shadow-xl rounded-2xl p-6 relative overflow-hidden group hover:-translate-y-1 transition-all duration-300"
            style="animation-delay: 0.2s;">
            <div
                class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-blue-500/10 rounded-full blur-xl group-hover:bg-blue-500/20 transition-all duration-500">
            </div>
            <div class="relative z-10">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-slate-500 dark:text-slate-400 text-sm font-medium">Classifications</h3>
                    <div class="p-2 bg-blue-500/10 rounded-lg text-blue-600 dark:text-blue-400">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                    </div>
                </div>
                <div class="flex items-baseline">
                    <p class="text-3xl font-bold text-slate-900 dark:text-white">{{ $stats['classifications'] }}</p>
                    <span class="ml-2 text-sm text-slate-500 dark:text-slate-400">Active</span>
                </div>
            </div>
        </div>

        <!-- Types -->
        <div class="bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 shadow-xl rounded-2xl p-6 relative overflow-hidden group hover:-translate-y-1 transition-all duration-300"
            style="animation-delay: 0.3s;">
            <div
                class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-emerald-500/10 rounded-full blur-xl group-hover:bg-emerald-500/20 transition-all duration-500">
            </div>
            <div class="relative z-10">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-slate-500 dark:text-slate-400 text-sm font-medium">Types</h3>
                    <div class="p-2 bg-emerald-500/10 rounded-lg text-emerald-600 dark:text-emerald-400">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                        </svg>
                    </div>
                </div>
                <div class="flex items-baseline">
                    <p class="text-3xl font-bold text-slate-900 dark:text-white">{{ $stats['types'] }}</p>
                    <span class="ml-2 text-sm text-slate-500 dark:text-slate-400">Defined</span>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
        <!-- Left Column: Recent Activity -->
        <div class="lg:col-span-2">
            <div class="bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 shadow-xl rounded-2xl p-6 animate-fade-in-up"
                style="animation-delay: 0.4s;">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-semibold text-slate-900 dark:text-white">Recent Activity</h3>
                    <button
                        class="text-sm text-violet-600 dark:text-violet-400 hover:text-violet-700 dark:hover:text-violet-300 transition-colors">View
                        All</button>
                </div>
                <div class="space-y-4">
                    @for($i = 0; $i < 3; $i++)
                        <div
                            class="flex items-center gap-4 p-3 rounded-xl hover:bg-slate-100 dark:hover:bg-white/5 transition-colors group">
                            <div
                                class="w-10 h-10 rounded-full bg-violet-500/10 flex items-center justify-center text-violet-600 dark:text-violet-400 group-hover:scale-110 transition-transform">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-slate-900 dark:text-white">New book added</p>
                                <p class="text-xs text-slate-500 dark:text-slate-400">The Great Gatsby</p>
                            </div>
                            <span class="text-xs text-slate-500 dark:text-slate-400">2m ago</span>
                        </div>
                    @endfor
                </div>
            </div>
        </div>

        <!-- Right Column: Quick Actions -->
        <div class="space-y-8">
            <div class="bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 shadow-xl rounded-2xl p-6 animate-fade-in-up"
                style="animation-delay: 0.5s;">
                <h3 class="text-lg font-semibold text-slate-900 dark:text-white mb-6">Quick Actions</h3>
                <div class="grid grid-cols-1 gap-4">
                    <a href="{{ route('admin.books.create') }}"
                        class="group flex items-center p-4 rounded-xl bg-slate-50 dark:bg-white/5 hover:bg-violet-500 hover:text-white transition-all duration-300 border border-slate-200 dark:border-white/5 hover:border-violet-500">
                        <div
                            class="p-3 rounded-lg bg-white dark:bg-white/10 text-violet-600 dark:text-violet-400 group-hover:bg-white/20 group-hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-semibold text-slate-900 dark:text-white group-hover:text-white">Add New
                                Book</p>
                            <p class="text-xs text-slate-500 dark:text-slate-400 group-hover:text-violet-100">Create a new
                                book entry</p>
                        </div>
                    </a>

                    <a href="{{ route('admin.categories.create') }}"
                        class="group flex items-center p-4 rounded-xl bg-slate-50 dark:bg-white/5 hover:bg-fuchsia-500 hover:text-white transition-all duration-300 border border-slate-200 dark:border-white/5 hover:border-fuchsia-500">
                        <div
                            class="p-3 rounded-lg bg-white dark:bg-white/10 text-fuchsia-600 dark:text-fuchsia-400 group-hover:bg-white/20 group-hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-semibold text-slate-900 dark:text-white group-hover:text-white">Add
                                Category</p>
                            <p class="text-xs text-slate-500 dark:text-slate-400 group-hover:text-fuchsia-100">Create new
                                category</p>
                        </div>
                    </a>

                    <a href="{{ route('admin.types.create') }}"
                        class="group flex items-center p-4 rounded-xl bg-slate-50 dark:bg-white/5 hover:bg-emerald-500 hover:text-white transition-all duration-300 border border-slate-200 dark:border-white/5 hover:border-emerald-500">
                        <div
                            class="p-3 rounded-lg bg-white dark:bg-white/10 text-emerald-600 dark:text-emerald-400 group-hover:bg-white/20 group-hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-semibold text-slate-900 dark:text-white group-hover:text-white">Add Type
                            </p>
                            <p class="text-xs text-slate-500 dark:text-slate-400 group-hover:text-emerald-100">Define new
                                book type</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Section: Top Authors -->
    <div class="bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 shadow-xl rounded-2xl p-6 animate-fade-in-up"
        style="animation-delay: 0.6s;">
        <h3 class="text-lg font-semibold text-slate-900 dark:text-white mb-6">Top Authors</h3>
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead>
                    <tr class="border-b border-slate-200 dark:border-slate-700">
                        <th
                            class="text-left py-3 px-4 text-xs font-medium text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                            Author</th>
                        <th
                            class="text-right py-3 px-4 text-xs font-medium text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                            Books Count</th>
                        <th
                            class="text-right py-3 px-4 text-xs font-medium text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                            Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                    @foreach($topAuthors as $author)
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700 transition-colors">
                            <td class="py-3 px-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-8 h-8 rounded-full bg-violet-100 dark:bg-violet-500/20 flex items-center justify-center text-violet-600 dark:text-violet-400 font-bold text-xs">
                                        {{ substr($author->author, 0, 1) }}
                                    </div>
                                    <span
                                        class="text-sm font-medium text-slate-900 dark:text-white">{{ $author->author }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-4 text-right">
                                <span class="text-sm text-slate-600 dark:text-slate-400">{{ $author->books_count }}
                                    Books</span>
                            </td>
                            <td class="py-3 px-4 text-right">
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800 dark:bg-emerald-500/20 dark:text-emerald-400">
                                    Active
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection