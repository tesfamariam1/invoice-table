<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Invoice</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased font-sans">
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50 min-h-screen flex flex-col">
            <!-- Container -->
            <div class="relative w-full max-w-2xl px-6 mx-auto lg:max-w-7xl flex flex-col flex-grow">
                
                <!-- Header -->
                <header class="flex justify-between items-center py-6">
                    <!-- Centered Title -->
                    <div class="flex-1 text-center text-lg font-semibold">
                        My Invoice
                    </div>
    
                    <!-- Navigation (Top Right) -->
                    @if (Route::has('login'))
                        <livewire:welcome.navigation />
                    @endif
                </header>
    
                <!-- Main Content (Centered in Viewport) -->
                <main class="flex flex-grow items-center justify-center">
                    <div class="text-xl font-medium">
                        Welcome to Invoice
                    </div>
                </main>
    
                <!-- Footer -->
                <footer class="py-6 text-center text-sm text-black dark:text-white/70">
                    Tesfamariam Teshome
                </footer>
    
            </div>
        </div>
    </body>
    
</html>
