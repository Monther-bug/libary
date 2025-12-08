<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans antialiased text-gray-900 bg-gray-100 dark:bg-gray-900 dark:text-gray-100">
    <div class="min-h-screen flex flex-col">
        <nav class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="shrink-0 flex items-center">
                            <a href="{{ route('home') }}" class="text-2xl font-bold text-indigo-600 dark:text-indigo-400">
                                Library
                            </a>
                        </div>

                        <!-- Navigation Links -->
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <a href="{{ route('home') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('home') ? 'border-indigo-400 text-gray-900 dark:text-gray-100' : 'border-transparent text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700' }} text-sm font-medium leading-5 transition duration-150 ease-in-out">
                                Home
                            </a>
                            <a href="{{ route('about') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('about') ? 'border-indigo-400 text-gray-900 dark:text-gray-100' : 'border-transparent text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700' }} text-sm font-medium leading-5 transition duration-150 ease-in-out">
                                About
                            </a>
                            <a href="{{ route('contact') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('contact') ? 'border-indigo-400 text-gray-900 dark:text-gray-100' : 'border-transparent text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700' }} text-sm font-medium leading-5 transition duration-150 ease-in-out">
                                Contact
                            </a>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <a href="{{ route('admin.login') }}" class="text-sm text-gray-700 dark:text-gray-300 underline">Admin Login</a>
                    </div>
                </div>
            </div>
        </nav>

        <main class="flex-grow">
            @yield('content')
        </main>

        <footer class="bg-white dark:bg-gray-800 border-t border-gray-100 dark:border-gray-700 mt-auto">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <p class="text-center text-sm text-gray-500 dark:text-gray-400">
                    &copy; {{ date('Y') }} Library Management System. All rights reserved.
                </p>
            </div>
        </footer>
    </div>
</body>
</html>
