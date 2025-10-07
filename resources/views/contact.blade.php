@extends('layouts.app') {{-- Assurez-vous d'avoir un layout de base --}}

@section('content')

<div class="bg-gray-50 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- 1. En-tête de la page --}}
        <header class="text-center mb-12">
            <h1 class="text-3xl font-extrabold text-gray-900 mb-2">Contactez-nous</h1>
            <p class="text-md text-gray-500">
                Une question, un problème ou une suggestion ? Notre équipe est là pour vous aider.
            </p>
        </header>

        {{-- 2. Bloc Principal : Infos de Contact et Formulaire --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">

            {{-- Colonne 1 : Informations de contact --}}
            <div class="lg:col-span-1 bg-white shadow-lg rounded-xl p-6 h-fit space-y-6 border border-gray-100">
                <h2 class="text-xl font-semibold text-gray-900 mb-4">Informations de contact</h2>

                {{-- Email --}}
                <div class="flex items-start space-x-3">
                    <div class="p-3 bg-blue-100 rounded-lg text-blue-600">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-900">Email</p>
                        <a href="mailto:contact@serviceslocaux.com" class="text-blue-600 hover:text-blue-700 text-sm">contact@serviceslocaux.com</a>
                        <p class="text-xs text-gray-500">Réponse sous 24h</p>
                    </div>
                </div>

                {{-- Téléphone --}}
                <div class="flex items-start space-x-3">
                    <div class="p-3 bg-blue-100 rounded-lg text-blue-600">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.5l1 4a1 1 0 01-.5 1.15L7.5 9.5a11.002 11.002 0 005 5l.85-1.5a1 1 0 011.15-.5l4 1V19a2 2 0 01-2 2h-4c-5.523 0-10-4.477-10-10V5z"></path></svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-900">Téléphone</p>
                        <p class="text-sm text-gray-700">+221 33 XXX XX XX</p>
                        <p class="text-xs text-gray-500">Lun-Sam 9h-18h</p>
                    </div>
                </div>

                {{-- Adresse --}}
                <div class="flex items-start space-x-3">
                    <div class="p-3 bg-blue-100 rounded-lg text-blue-600">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0L6.343 16.657A8 8 0 1117.657 16.657z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-900">Adresse</p>
                        <p class="text-sm text-gray-700">Dakar, Sénégal</p>
                        <p class="text-xs text-gray-500">Adresse fictive</p>
                    </div>
                </div>

                {{-- Horaires --}}
                <div class="flex items-start space-x-3">
                    <div class="p-3 bg-blue-100 rounded-lg text-blue-600">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-900">Horaires</p>
                        <p class="text-sm text-gray-700">Lun-Ven 9h-18h</p>
                        <p class="text-xs text-gray-500">Sam 9h-13h</p>
                    </div>
                </div>
            </div>

            {{-- Colonne 2 & 3 : Formulaire "Envoyez-nous un message" --}}
            <div class="lg:col-span-2 bg-white shadow-lg rounded-xl p-8 border border-gray-100">
                <h2 class="text-xl font-semibold text-gray-900 mb-6">Envoyez-nous un message</h2>

                <form action="#" method="POST" class="space-y-6">
                    @csrf

                    {{-- Nom complet et Email --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="full_name" class="block text-sm font-medium text-gray-700">Nom complet *</label>
                            <input type="text" name="full_name" id="full_name" required placeholder="Nom complet"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email *</label>
                            <input type="email" name="email" id="email" required placeholder="votre@email.com"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                    </div>

                    {{-- Sujet (Select) --}}
                    <div>
                        <label for="subject" class="block text-sm font-medium text-gray-700">Sujet *</label>
                        <select id="subject" name="subject" required
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm text-gray-700">
                            <option value="" disabled selected>Sélectionnez un sujet</option>
                            <option value="question">Question générale</option>
                            <option value="assistance">Demande d'assistance technique</option>
                            <option value="prestataire">Devenir prestataire</option>
                            <option value="signalement">Signaler un problème</option>
                        </select>
                    </div>

                    {{-- Message --}}
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700">Message *</label>
                        <textarea id="message" name="message" rows="4" required placeholder="Décrivez votre demande en détail..."
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></textarea>
                    </div>

                    <p class="text-xs text-gray-500">* Champs obligatoires. Vos données sont traitées conformément à notre <a href="{{ route('politique.privacy') }}" class="text-blue-600 hover:underline">politique de confidentialité</a>.</p>

                    {{-- Bouton d'envoi --}}
                    <div>
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150">
                            Envoyer le message
                        </button>
                    </div>
                </form>
            </div>
        </div>
        
        {{-- Ligne de séparation --}}
        <div class="py-12">
            <div class="border-t border-gray-200"></div>
        </div>

        {{-- 3. et 4. Questions Fréquentes, Prestataires et Urgence (Grille 3 Colonnes) --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            {{-- Questions fréquentes --}}
            <div class="bg-white rounded-xl p-6 border border-gray-100 shadow-sm space-y-4">
                <h2 class="text-xl font-semibold text-gray-900 mb-4">Questions fréquentes</h2>

                {{-- Question 1 --}}
                <div>
                    <h3 class="font-medium text-gray-800">Comment devenir prestataire ?</h3>
                    <p class="text-sm text-gray-600">
                        Cliquez sur "Devenir prestataire" et remplissez le formulaire d'inscription.
                    </p>
                </div>

                {{-- Question 2 --}}
                <div>
                    <h3 class="font-medium text-gray-800">Les services sont-ils garantis ?</h3>
                    <p class="text-sm text-gray-600">
                        Nous agissons comme intermédiaire. La qualité dépend du prestataire choisi.
                    </p>
                </div>

                {{-- Question 3 --}}
                <div>
                    <h3 class="font-medium text-gray-800">Comment signaler un problème ?</h3>
                    <p class="text-sm text-gray-600">
                        Utilisez le bouton de signalement sur chaque fiche prestataire.
                    </p>
                </div>
            </div>

            {{-- Pour les prestataires --}}
            <div class="bg-white rounded-xl p-6 border border-gray-100 shadow-sm text-center flex flex-col justify-between items-center">
                <h2 class="text-xl font-semibold text-gray-900">Pour les prestataires</h2>
                <p class="text-sm text-gray-600 mt-2 mb-4">
                    Vous êtes un professionnel et souhaitez rejoindre notre plateforme ?
                </p>
                <a href="{{ route('auth.register') }}" 
                   class="w-full py-2 px-4 border border-blue-600 rounded-md shadow-sm text-sm font-medium text-blue-600 hover:bg-blue-50 transition duration-150">
                   Devenir prestataire
                </a>
            </div>

            {{-- Urgence --}}
            <div class="bg-white rounded-xl p-6 border border-gray-100 shadow-sm text-center flex flex-col justify-between items-center">
                <h2 class="text-xl font-semibold text-gray-900">Urgence</h2>
                <p class="text-sm text-gray-600 mt-2 mb-4">
                    Pour les signalements urgents (fraude, escroquerie), contactez-nous immédiatement.
                </p>
                <button type="button" 
                    class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition duration-150">
                    Signalement urgent
                </button>
            </div>
        </div>

    </div>
</div>

{{-- Note : Le footer est supposé être inclus par le layout 'layouts.app' --}}

@endsection