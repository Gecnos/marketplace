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
                    <a href="{{ route('categories.index') }}" class="text-gray-500 hover:text-gray-900 px-3 py-2 text-sm font-medium transition duration-150 ease-in-out">Catégories</a>
                    <a href="#" class="text-gray-500 hover:text-gray-900 px-3 py-2 text-sm font-medium transition duration-150 ease-in-out">Rechercher</a>
                    <a href="#" class="text-gray-500 hover:text-gray-900 px-3 py-2 text-sm font-medium transition duration-150 ease-in-out">À propos</a>
                    <a href="#" class="text-gray-500 hover:text-gray-900 px-3 py-2 text-sm font-medium transition duration-150 ease-in-out">Contact</a>
                </div>

                {{-- Boutons "Se connecter" et "S'inscrire" --}}
                <div class="flex items-center space-x-3">
                    @guest
                        <a href="{{ route('auth.login') }}" class="py-2 px-3 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 transition duration-150 ease-in-out">
                            Se connecter
                        </a>
                        <a href="{{ route('auth.register') }}" class="py-2 px-3 border border-transparent rounded-md text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 shadow-md transition duration-150 ease-in-out">
                            S'inscrire
                        </a>
                    @endguest
                    @auth
                        <div class="text-sm text-gray-500">
                            {{ Auth::user()->name }}
                        </div>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="py-2 px-3 border border-transparent rounded-md text-sm font-medium text-white bg-red-600 hover:bg-red-700 shadow-md transition duration-150 ease-in-out">
                                Déconnexion
                            </button>
                        </form>
                    @endauth
                </div>

            </div>
        </div>
    </nav>
    
    {{-- 2. CONTENU SPÉCIFIQUE À LA PAGE --}}
    <main>
        @yield('content')
    </main>


@vite('resources/js/app.js')
</body>
<footer class="bg-white border-t border-gray-200 mt-12">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            
            {{-- Colonne 1 : Logo et Description --}}
            <div class="space-y-4 col-span-2 md:col-span-1">
                 <a href="/" class="flex-shrink-0 flex items-center">
                    <div class="bg-blue-600 p-2 rounded-lg mr-2">
                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5M12 7h2m-2 4h2"></path></svg>
                    </div>
                    <span class="text-xl font-bold text-blue-600">Services locaux</span>
                </a>
                <p class="text-sm text-gray-500 max-w-xs">
                    La plateforme qui connecte les clients aux meilleurs prestataires de services locaux.
                </p>                
            </div>

            {{-- Colonne 2 : Services --}}
            <div>
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Services</h3>
                <ul class="space-y-3 text-sm">
                    <li><a href="{{ route('categories.index') }}" class="text-gray-600 hover:text-blue-600 transition duration-150">Toutes les catégories</a></li>
                    <li><a href="{{ route('search.results') }}" class="text-gray-600 hover:text-blue-600 transition duration-150">Rechercher un service</a></li>
                    <li><a href="{{ route('auth.register') }}" class="text-gray-600 hover:text-blue-600 transition duration-150">Devenir prestataire</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-blue-600 transition duration-150">À propos de nous</a></li>
                </ul>
            </div>

            {{-- Colonne 3 : Mon Compte --}}
            <div>
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Mon Compte</h3>
                <ul class="space-y-3 text-sm">
                    <li><a href="{{ route('auth.login') }}" class="text-gray-600 hover:text-blue-600 transition duration-150">Se connecter</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-blue-600 transition duration-150">Mon profil</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-blue-600 transition duration-150">Mes favoris</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-blue-600 transition duration-150">Centre d'aide</a></li>
                </ul>
            </div>

            {{-- Colonne 4 : Contact --}}
            <div>
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Contact</h3>
                <div class="space-y-3 text-sm text-gray-600">
                    {{-- <p class="flex items-center space-x-2">
                        <svg class="h-4 w-4 text-gray-500" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2zM4 6v.51l8 5.66 8-5.66V6H4zm0 13c0 .55.45 1 1 1h14c.55 0 1-.45 1-1V8.2l-8 5.67-8-5.67V19z"/></svg>
                        <span>contact@serviceslocaux.fr</span>
                    </p>
                    <p class="flex items-center space-x-2">
                        <svg class="h-4 w-4 text-gray-500" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm3.85 14.5c-1.48 0-2.83-.4-4.08-1.22l-.12-.08c-1.22-.76-2.22-1.84-2.91-3.07l-.08-.12c-.82-1.25-1.22-2.6-1.22-4.08 0-1.88.94-3.56 2.4-4.56.09-.06.2-.1.32-.14.12-.04.25-.06.38-.06.13 0 .26.02.38.06.12.04.23.08.32.14 1.46 1 2.4 2.68 2.4 4.56 0 1.48-.4 2.83-1.22 4.08l-.08.12c-.76 1.22-1.84 2.22-3.07 2.91l-.12.08c-1.25.82-2.6 1.22-4.08 1.22z"/></svg>
                        <span>01 23 45 67 89</span>
                    </p>
                    <p class="flex items-center space-x-2">
                        <svg class="h-4 w-4 text-gray-500" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                        <span>Paris, France</span>
                    </p> --}}
                    <a href="{{ route('contact') }}" class="text-blue-600 hover:text-blue-700 font-medium transition duration-150 block mt-2">Nous contacter</a>
                </div>
            </div>
        </div>
        
        {{-- Section Copyright et Mentions Légales --}}
        <div class="mt-12 pt-6 border-t border-gray-200 flex flex-col md:flex-row justify-between items-center text-sm text-gray-500">
            <p>&copy; 2024 ServicesLocaux. Tous droits réservés.</p>
            <div class="flex space-x-4 mt-4 md:mt-0">
                <a href="{{ route('politique.conditions') }}" class="hover:text-gray-900 transition duration-150">Conditions d'utilisation</a>
                <a href="{{ route('politique.privacy') }}" class="hover:text-gray-900 transition duration-150">Politique de confidentialité</a>
            </div>
        </div>
    </div>
</footer>
</html>