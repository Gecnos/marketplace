@extends('layouts.app')

@section('content')

{{-- Initialisation de l'état Alpine.js pour gérer la bascule Client/Prestataire. 
     'client' est défini comme le type par défaut. --}}
<div x-data="{ accountType: 'client', categoryId: '' }" class="flex flex-col items-center justify-center py-12 px-4 sm:px-6 lg:px-8 bg-gray-100">
    
    <div class="max-w-lg w-full space-y-8">
        
        {{-- En-tête du formulaire --}}
        <div class="text-center">
            <h2 class="mt-6 text-3xl font-extrabold text-gray-900">
                Créer un compte
            </h2>
            <p class="mt-2 text-sm text-gray-600">
                Rejoignez notre communauté
            </p>
        </div>

        {{-- Conteneur principal (Onglets et Formulaire) --}}
        <div class="bg-white shadow-xl rounded-lg overflow-hidden">
            
            {{-- Onglets de Navigation (pour lier vers le Login) --}}
            <div class="flex border-b border-gray-200">
                <a href="{{ route('auth.login') }}" class="w-1/2 text-center py-3 text-sm font-medium text-gray-500 bg-gray-50 hover:bg-gray-100 border-r border-gray-200 transition duration-150 ease-in-out">
                    Connexion
                </a>
                <a href="{{ route('auth.register') }}" class="w-1/2 text-center py-3 text-sm font-medium text-blue-600 bg-white border-t-2 border-t-blue-600">
                    Inscription
                </a>
            </div>

            {{-- Conteneur du Formulaire --}}
            <div class="p-8">

                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <strong class="font-bold">Oops!</strong>
                        <span class="block sm:inline">Il y a eu quelques problèmes avec votre saisie.</span>
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                {{-- 1. Sélecteur du Type de compte (Client / Prestataire) --}}
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Type de compte</label>
                    <div class="flex border border-gray-300 rounded-lg overflow-hidden">
                        
                        {{-- Bouton Client --}}
                        <button type="button" @click="accountType = 'client'" 
                            :class="accountType === 'client' ? 'bg-blue-600 text-white border-blue-600' : 'bg-gray-50 text-gray-700 hover:bg-gray-100'" 
                            class="w-1/2 py-2 text-sm font-medium transition duration-150 ease-in-out border-r border-gray-300">
                            Client
                        </button>
                        
                        {{-- Bouton Prestataire --}}
                        <button type="button" @click="accountType = 'provider'" 
                            :class="accountType === 'provider' ? 'bg-blue-600 text-white border-blue-600' : 'bg-gray-50 text-gray-700 hover:bg-gray-100'" 
                            class="w-1/2 py-2 text-sm font-medium transition duration-150 ease-in-out">
                            Prestataire
                        </button>
                    </div>
                </div>

                {{-- 2. Formulaire d'Inscription --}}
                <form class="space-y-4" action="{{ route('register') }}" method="POST">
                    @csrf
                    <input type="hidden" name="accountType" x-model="accountType">
                    {{-- Prénom et Nom (Champs communs) --}}
                    <div class="flex space-x-4">
                        <div class="w-1/2">
                            <label for="prenom" class="block text-sm font-medium text-gray-700 sr-only">Prénom</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                </div>
                                <input id="prenom" name="prenom" type="text" required 
                                    class="appearance-none block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" 
                                    placeholder="Prénom">
                            </div>
                        </div>
                        <div class="w-1/2">
                            <label for="nom" class="block text-sm font-medium text-gray-700 sr-only">Nom</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <input id="nom" name="nom" type="text" required 
                                    class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" 
                                    placeholder="Nom">
                            </div>
                        </div>
                    </div>

                    {{-- CHAMPS SPÉCIFIQUES PRESTATAIRE (Affichés si accountType est 'provider') --}}
                    <template x-if="accountType === 'provider'">
                        <div class="space-y-4" x-transition:enter.duration.500ms x-transition:leave.duration.300ms>
                        
                            {{-- Nom de l'entreprise --}}
                            <div>
                                <label for="company" class="block text-sm font-medium text-gray-700 sr-only">Nom de l'entreprise</label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <input id="company" name="company" type="text" :required="accountType === 'provider'" 
                                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" 
                                        placeholder="Nom de votre entreprise">
                                </div>
                            </div>
                            
                            {{-- Catégorie (Select) --}}
                            <div>
                                <label for="category" class="block text-sm font-medium text-gray-700 sr-only">Catégorie</label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <select id="category" name="category_id" :required="accountType === 'provider'" x-model="categoryId"
                                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm text-gray-400">
                                        <option value="" disabled selected>Sélectionnez votre domaine</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                        <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                    </div>
                                </div>
                            </div>

                            {{-- Champ pour une nouvelle catégorie --}}
                            <div x-show="categoryId === '10'" class="space-y-4" x-transition:enter.duration.500ms x-transition:leave.duration.300ms>
                                <div>
                                    <label for="other_category" class="block text-sm font-medium text-gray-700 sr-only">Autre catégorie</label>
                                    <div class="mt-1 relative rounded-md shadow-sm">
                                        <input id="other_category" name="other_category" type="text" 
                                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" 
                                            placeholder="Précisez la catégorie">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                    
                    {{-- CHAMPS COMMUNS (Email, Téléphone, Ville) --}}
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 sr-only">Email</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <input id="email" name="email" type="email" autocomplete="email" required 
                                class="appearance-none block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" 
                                placeholder="votre@email.com">
                        </div>
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 sr-only">Téléphone</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            </div>
                            <input id="phone" name="phone" type="tel" autocomplete="tel" required 
                                class="appearance-none block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" 
                                placeholder="06 12 34 56 78">
                        </div>
                    </div>

                    <div>
                        <label for="city" class="block text-sm font-medium text-gray-700 sr-only">Ville</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            <input id="city" name="city" type="text" required 
                                class="appearance-none block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" 
                                placeholder="Votre ville">
                        </div>
                    </div>
                    
                    {{-- Mots de passe --}}
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 sr-only">Mot de passe</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6-4h12a2 2 0 002-2V7a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z"></path></svg>
                            </div>
                            <input id="password" name="password" type="password" required 
                                class="appearance-none block w-full pl-10 pr-10 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" 
                                placeholder="Mot de passe">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer">
                                {{-- <svg class="h-5 w-5 text-gray-400 hover:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg> --}}
                            </div>
                        </div>
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 sr-only">Confirmer le mot de passe</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6-4h12a2 2 0 002-2V7a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z"></path></svg>
                            </div>
                            <input id="password_confirmation" name="password_confirmation" type="password" required 
                                class="appearance-none block w-full pl-10 pr-10 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" 
                                placeholder="Confirmer le mot de passe">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer">
                                {{-- <svg class="h-5 w-5 text-gray-400 hover:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg> --}}
                            </div>
                        </div>
                    </div>

                    {{-- Case à cocher et Bouton --}}
                    <div class="flex items-center pt-2">
                        <input id="terms" name="terms" type="checkbox" required class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label for="terms" class="ml-2 block text-sm text-gray-900">
                            J'accepte les 
                            <a href="{{ route('politique.conditions') }}" class="font-medium text-blue-600 hover:text-blue-500">conditions d'utilisation</a>
                        </label>
                    </div>

                    <div>
                        <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                            Créer mon compte
                        </button>
                    </div>
                    
                </form>

            </div>
        </div>

    </div>
</div>

@endsection
