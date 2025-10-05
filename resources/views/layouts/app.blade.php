<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Services Locaux</title>

    {{-- Tailwind CSS et JS via Vite --}}
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 antialiased">

    {{-- 1. BARRE DE NAVIGATION (Votre code) --}}
    <nav class="bg-white shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">

                {{-- Logo / Nom de l'entreprise --}}
                <a href="/" class="flex-shrink-0 flex items-center">
                    <div class="bg-blue-600 p-2 rounded-lg mr-2">
                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5M12 7h2m-2 4h2"></path></svg>
                    </div>
                    <span class="text-xl font-bold text-blue-600">Services locaux</span>
                </a>

                {{-- Liens de navigation centraux --}}
                <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                    <a href="#" class="text-gray-500 hover:text-gray-900 px-3 py-2 text-sm font-medium transition duration-150 ease-in-out">Catégories</a>
                    <a href="#" class="text-gray-500 hover:text-gray-900 px-3 py-2 text-sm font-medium transition duration-150 ease-in-out">Rechercher</a>
                    <a href="#" class="text-gray-500 hover:text-gray-900 px-3 py-2 text-sm font-medium transition duration-150 ease-in-out">À propos</a>
                    <a href="#" class="text-gray-500 hover:text-gray-900 px-3 py-2 text-sm font-medium transition duration-150 ease-in-out">Contact</a>
                </div>

                {{-- Boutons "Se connecter" et "S'inscrire" --}}
                <div class="flex items-center space-x-3">
                    <a href="{{ route('auth.login') }}" class="py-2 px-3 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 transition duration-150 ease-in-out">
                        Se connecter
                    </a>
                    <a href="{{ route('auth.register') }}" class="py-2 px-3 border border-transparent rounded-md text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 shadow-md transition duration-150 ease-in-out">
                        S'inscrire
                    </a>
                </div>

            </div>
        </div>
    </nav>
    
    {{-- 2. CONTENU SPÉCIFIQUE À LA PAGE --}}
    <main>
        @yield('content')
    </main>

    {{-- 3. PIED DE PAGE (Footer) --}}
    {{-- <footer class="bg-white border-t border-gray-200 mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <div class="flex-shrink-0 flex items-center">
                    <div class="bg-blue-600 p-2 rounded-lg mr-2">
                         <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5M12 7h2m-2 4h2"></path></svg>
                    </div>
                    <span class="text-lg font-bold text-blue-600 hidden sm:block">Services locaux</span>
                </div>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-500 hover:text-gray-900 text-sm font-medium">Catégories</a>
                    <a href="#" class="text-gray-500 hover:text-gray-900 text-sm font-medium">Rechercher</a>
                    <a href="#" class="text-gray-500 hover:text-gray-900 text-sm font-medium">À propos</a>
                    <a href="#" class="text-gray-500 hover:text-gray-900 text-sm font-medium">Contact</a>
                </div>
            </div>
            <div class="flex items-center space-x-3">
                <a href="/login" class="py-2 px-3 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 transition duration-150 ease-in-out">
                    Se connecter
                </a>
                <a href="/register" class="py-2 px-3 border border-transparent rounded-md text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 shadow-md transition duration-150 ease-in-out">
                    S'inscrire
                </a>
            </div>
        </div>
    </footer> --}}
    
    @vite('resources/js/app.js')
</body>
</html>