@extends('layouts.app')

@section('content')

<div class="flex flex-col items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-gray-100 min-h-screen-minus-header-footer">
    
    <div class="max-w-md w-full space-y-8">
        
        {{-- En-tête --}}
        <div class="text-center">
            <h2 class="mt-6 text-3xl font-extrabold text-gray-900">
                Bienvenue
            </h2>
            <p class="mt-2 text-sm text-gray-600">
                Connectez-vous ou créez votre compte
            </p>
        </div>

        {{-- Conteneur principal (Onglets et Formulaire) --}}
        <div class="bg-white shadow-xl rounded-lg overflow-hidden">
            
            {{-- Onglets (Navigation) --}}
            <div class="flex border-b border-gray-200">
                {{-- Onglet Connexion (Actif) --}}
                <a href="{{ route('auth.login') }}" class="w-1/2 text-center py-3 text-sm font-medium text-blue-600 bg-white border-r border-gray-200 border-t-2 border-t-blue-600">
                    Connexion
                </a>
                {{-- Onglet Inscription (Inactif) --}}
                <a href="{{ route('auth.register') }}" class="w-1/2 text-center py-3 text-sm font-medium text-gray-500 bg-gray-50 hover:bg-gray-100 transition duration-150 ease-in-out">
                    Inscription
                </a>
            </div>

            {{-- Conteneur du Formulaire --}}
            <div class="p-8">
                
                {{-- En-tête du Formulaire de Connexion --}}
                <h3 class="text-xl font-semibold text-gray-900">
                    Se connecter
                </h3>
                <p class="mt-1 mb-6 text-sm text-gray-500">
                    Accédez à votre compte existant
                </p>

                {{-- Formulaire --}}
                <form class="space-y-4" action="#" method="POST">
                    
                    {{-- Champ Email --}}
                    <div>
                        <label for="email" class="sr-only">Email</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input id="email" name="email" type="email" autocomplete="email" required 
                                class="appearance-none block w-full pl-3 pr-10 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" 
                                placeholder="votre@email.com">
                            {{-- Icône --}}
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                        </div>
                    </div>

                    {{-- Champ Mot de passe --}}
                    <div>
                        <label for="password" class="sr-only">Mot de passe</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input id="password" name="password" type="password" autocomplete="current-password" required 
                                class="appearance-none block w-full pl-10 pr-10 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" 
                                placeholder="Votre mot de passe">
                            {{-- Icône du cadenas (Gauche) --}}
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6-4h12a2 2 0 002-2V7a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z"></path></svg>
                            </div>
                            {{-- Icône d'affichage du mot de passe (Œil - Droite) --}}
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer">
                                <svg class="h-5 w-5 text-gray-400 hover:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            </div>
                        </div>
                    </div>

                    {{-- Options (Se souvenir de moi et Mot de passe oublié) --}}
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <label for="remember-me" class="ml-2 block text-sm text-gray-900">
                                Se souvenir de moi
                            </label>
                        </div>

                        <div class="text-sm">
                            <a href="#" class="font-medium text-blue-600 hover:text-blue-500">
                                Mot de passe oublié ?
                            </a>
                        </div>
                    </div>

                    {{-- Bouton Se connecter --}}
                    <div>
                        <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                            Se connecter
                        </button>
                    </div>
                </form>

            </div> {{-- Fin Conteneur du Formulaire --}}

        </div> {{-- Fin Conteneur principal --}}

    </div> {{-- Fin max-w-md --}}

</div>

{{-- NOTE : J'ai supposé que vous avez une classe Tailwind personnalisée ou que le centrage vertical est géré par la hauteur minimale du conteneur. Si vous utilisez la classe min-h-screen standard de Tailwind, le formulaire sera centré entre le haut de la fenêtre et le bas, au-dessus du footer. --}}
@endsection