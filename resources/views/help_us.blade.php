@extends('layouts.app')

@section('content')

<div class="bg-white py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- 1. En-tête de la Page --}}
        <header class="text-center mb-10">
            <h1 class="text-3xl font-extrabold text-gray-900 mb-2">Centre d'aide</h1>
            <p class="text-md text-gray-500">
                Trouvez rapidement les réponses à vos questions ou contactez notre équipe support
            </p>
        </header>

        {{-- Barre de recherche FAQ --}}
        <div class="mb-12">
            <div class="relative">
                <input type="search" placeholder="Rechercher dans l'aide..."
                       class="w-full py-3 px-5 border border-gray-300 rounded-xl focus:ring-blue-500 focus:border-blue-500 text-base">
                <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </div>
        </div>

        {{-- 2. Questions fréquentes (Accordéon) --}}
        <h2 class="text-xl font-bold text-gray-900 mb-4">Questions fréquentes</h2>

        <div class="space-y-4">

            {{-- Catégorie 1: Utilisation de la plateforme --}}
            <h3 class="text-lg font-semibold text-gray-700 mt-6 mb-2 flex items-center">
                <span class="p-1 rounded-full bg-blue-100 text-blue-600 mr-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </span>
                Utilisation de la plateforme
            </h3>
            
            {{-- FAQ Item 1 --}}
            <div x-data="{ open: false }" class="border-b border-gray-200">
                <button @click="open = !open" class="flex justify-between items-center w-full py-3 text-left font-medium text-gray-900 hover:text-blue-600">
                    Comment rechercher un prestataire ?
                    <svg :class="{'transform rotate-180': open, 'transform rotate-0': !open}" class="w-5 h-5 text-gray-500 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 max-h-0" x-transition:enter-end="opacity-100 max-h-screen" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 max-h-screen" x-transition:leave-end="opacity-0 max-h-0" class="pb-3 text-sm text-gray-600 overflow-hidden">
                    Utilisez la barre de recherche sur la page d'accueil ou la page "Rechercher" en saisissant un service, un nom, ou en filtrant par localisation, catégorie et note.
                </div>
            </div>

            {{-- FAQ Item 2 --}}
            <div x-data="{ open: false }" class="border-b border-gray-200">
                <button @click="open = !open" class="flex justify-between items-center w-full py-3 text-left font-medium text-gray-900 hover:text-blue-600">
                    Comment contacter un prestataire ?
                    <svg :class="{'transform rotate-180': open}" class="w-5 h-5 text-gray-500 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="open" x-transition class="pb-3 text-sm text-gray-600 overflow-hidden">
                    Le numéro de téléphone du prestataire est visible sur sa fiche. Vous pouvez le contacter directement par appel ou via WhatsApp.
                </div>
            </div>
            
            {{-- FAQ Item 3 --}}
            <div x-data="{ open: false }" class="border-b border-gray-200">
                <button @click="open = !open" class="flex justify-between items-center w-full py-3 text-left font-medium text-gray-900 hover:text-blue-600">
                    Comment ajouter un prestataire à mes favoris ?
                    <svg :class="{'transform rotate-180': open}" class="w-5 h-5 text-gray-500 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="open" x-transition class="pb-3 text-sm text-gray-600 overflow-hidden">
                    Cliquez sur l'icône de cœur (<span class="text-red-500">❤️</span>) présente sur la carte ou la fiche du prestataire. Vous devez être connecté pour utiliser cette fonctionnalité.
                </div>
            </div>

            {{-- FAQ Item 4 --}}
            <div x-data="{ open: false }" class="border-b border-gray-200">
                <button @click="open = !open" class="flex justify-between items-center w-full py-3 text-left font-medium text-gray-900 hover:text-blue-600">
                    Comment laisser un avis ?
                    <svg :class="{'transform rotate-180': open}" class="w-5 h-5 text-gray-500 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="open" x-transition class="pb-3 text-sm text-gray-600 overflow-hidden">
                    Après avoir utilisé les services d'un prestataire, connectez-vous et accédez à sa fiche. En bas, vous trouverez une section "Laisser un avis".
                </div>
            </div>

            {{-- Catégorie 2: Compte utilisateur --}}
            <h3 class="text-lg font-semibold text-gray-700 mt-8 mb-2 flex items-center">
                <span class="p-1 rounded-full bg-blue-100 text-blue-600 mr-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                </span>
                Compte utilisateur
            </h3>

            {{-- FAQ Item 5 --}}
            <div x-data="{ open: false }" class="border-b border-gray-200">
                <button @click="open = !open" class="flex justify-between items-center w-full py-3 text-left font-medium text-gray-900 hover:text-blue-600">
                    Comment créer un compte ?
                    <svg :class="{'transform rotate-180': open}" class="w-5 h-5 text-gray-500 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="open" x-transition class="pb-3 text-sm text-gray-600 overflow-hidden">
                    Cliquez sur "Mon compte" en haut à droite, puis sélectionnez l'onglet "Inscription". Vous pourrez choisir entre un compte Client ou Prestataire.
                </div>
            </div>
            
            {{-- FAQ Item 6 --}}
            <div x-data="{ open: false }" class="border-b border-gray-200">
                <button @click="open = !open" class="flex justify-between items-center w-full py-3 text-left font-medium text-gray-900 hover:text-blue-600">
                    J'ai oublié mon mot de passe
                    <svg :class="{'transform rotate-180': open}" class="w-5 h-5 text-gray-500 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="open" x-transition class="pb-3 text-sm text-gray-600 overflow-hidden">
                    Sur la page de connexion, cliquez sur "Mot de passe oublié ?" et suivez les instructions pour recevoir un lien de réinitialisation par email.
                </div>
            </div>

            {{-- Autres items de Compte (Simulés) --}}
            <div x-data="{ open: false }" class="border-b border-gray-200">
                <button @click="open = !open" class="flex justify-between items-center w-full py-3 text-left font-medium text-gray-900 hover:text-blue-600">
                    Comment modifier mes informations personnelles ?
                    <svg :class="{'transform rotate-180': open}" class="w-5 h-5 text-gray-500 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="open" x-transition class="pb-3 text-sm text-gray-600 overflow-hidden">
                    Accédez à votre tableau de bord ("Mon Profil") après vous être connecté pour modifier vos coordonnées et préférences.
                </div>
            </div>
            
            <div x-data="{ open: false }" class="border-b border-gray-200">
                <button @click="open = !open" class="flex justify-between items-center w-full py-3 text-left font-medium text-gray-900 hover:text-blue-600">
                    Comment supprimer mon compte ?
                    <svg :class="{'transform rotate-180': open}" class="w-5 h-5 text-gray-500 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="open" x-transition class="pb-3 text-sm text-gray-600 overflow-hidden">
                    Vous pouvez demander la suppression définitive de votre compte depuis la section "Mon Profil" ou en nous contactant directement par email.
                </div>
            </div>

            {{-- Catégorie 3: Sécurité et confidentialité --}}
            <h3 class="text-lg font-semibold text-gray-700 mt-8 mb-2 flex items-center">
                <span class="p-1 rounded-full bg-blue-100 text-blue-600 mr-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.108a9 9 0 10-14.836 10.374M10.8 7a.5.5 0 00-.5.5v2.5a.5.5 0 00.5.5h2.5a.5.5 0 00.5-.5V7.5a.5.5 0 00-.5-.5h-2.5z"></path></svg>
                </span>
                Sécurité et confidentialité
            </h3>

            {{-- FAQ Item 7 --}}
            <div x-data="{ open: false }" class="border-b border-gray-200">
                <button @click="open = !open" class="flex justify-between items-center w-full py-3 text-left font-medium text-gray-900 hover:text-blue-600">
                    Comment vérifier la fiabilité d'un prestataire ?
                    <svg :class="{'transform rotate-180': open}" class="w-5 h-5 text-gray-500 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="open" x-transition class="pb-3 text-sm text-gray-600 overflow-hidden">
                    Nous affichons une mention "Vérifié" pour les prestataires ayant fourni une preuve de leur activité (Kbis, Siret) et un taux d'avis positifs élevé.
                </div>
            </div>

            {{-- FAQ Item 8 --}}
            <div x-data="{ open: false }" class="border-b border-gray-200">
                <button @click="open = !open" class="flex justify-between items-center w-full py-3 text-left font-medium text-gray-900 hover:text-blue-600">
                    Mes données personnelles sont-elles protégées ?
                    <svg :class="{'transform rotate-180': open}" class="w-5 h-5 text-gray-500 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="open" x-transition class="pb-3 text-sm text-gray-600 overflow-hidden">
                    Oui, nous traitons vos données conformément à notre <a href="{{ route('politique.privacy') }}" class="text-blue-600 hover:underline">Politique de confidentialité</a>. Nous ne partageons vos coordonnées qu'avec le prestataire que vous choisissez de contacter.
                </div>
            </div>
            
            {{-- FAQ Item 9 --}}
            <div x-data="{ open: false }" class="border-b border-gray-200">
                <button @click="open = !open" class="flex justify-between items-center w-full py-3 text-left font-medium text-gray-900 hover:text-blue-600">
                    Comment signaler un problème avec un prestataire ?
                    <svg :class="{'transform rotate-180': open}" class="w-5 h-5 text-gray-500 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="open" x-transition class="pb-3 text-sm text-gray-600 overflow-hidden">
                    Vous pouvez utiliser le bouton "Signaler" sur sa fiche ou nous contacter via la section "Urgence" de la page Contact pour les cas graves.
                </div>
            </div>

            {{-- FAQ Item 10 --}}
            <div x-data="{ open: false }" class="border-b border-gray-200">
                <button @click="open = !open" class="flex justify-between items-center w-full py-3 text-left font-medium text-gray-900 hover:text-blue-600">
                    Que faire en cas de litige ?
                    <svg :class="{'transform rotate-180': open}" class="w-5 h-5 text-gray-500 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="open" x-transition class="pb-3 text-sm text-gray-600 overflow-hidden">
                    ServicesLocaux n'est qu'un intermédiaire. En cas de litige, nous vous recommandons de tenter une médiation directe avec le prestataire. Si cela échoue, contactez-nous pour que nous étudiions une possible intervention (suspension du compte).
                </div>
            </div>
        </div>


        <div class="py-12">
            <div class="border-t border-gray-200"></div>
        </div>

        {{-- 3. Besoin d'aide supplémentaire --}}
        <h2 class="text-xl font-bold text-gray-900 mb-6 text-center">Besoin d'aide supplémentaire ?</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
            
            {{-- Contact 1: Chat en direct --}}
            <div class="bg-white rounded-xl p-6 border border-gray-100 shadow-sm space-y-3">
                <div class="flex justify-center mb-2">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.86 9.86 0 01-3.72-2.386L2 21l1.63-2.583A9 9 0 0112 3a9 9 0 019 9z"></path></svg>
                </div>
                <h3 class="font-semibold text-lg text-gray-900">Chat en direct</h3>
                <p class="text-sm text-gray-500">Réponse immédiate pendant les heures de bureau.</p>
                <button class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 transition duration-150">
                    Démarrer une conversation
                </button>
            </div>

            {{-- Contact 2: Email --}}
            <div class="bg-white rounded-xl p-6 border border-gray-100 shadow-sm space-y-3">
                <div class="flex justify-center mb-2">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                </div>
                <h3 class="font-semibold text-lg text-gray-900">Email</h3>
                <p class="text-sm text-gray-500">Réponse sous 24h : support@serviceslocaux.fr</p>
                <a href="mailto:support@serviceslocaux.fr" class="w-full inline-block py-2 px-4 border border-blue-600 rounded-md shadow-sm text-sm font-medium text-blue-600 hover:bg-blue-50 transition duration-150">
                    Envoyer un email
                </a>
            </div>

            {{-- Contact 3: Téléphone --}}
            <div class="bg-white rounded-xl p-6 border border-gray-100 shadow-sm space-y-3">
                <div class="flex justify-center mb-2">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.5l1 4a1 1 0 01-.5 1.15L7.5 9.5a11.002 11.002 0 005 5l.85-1.5a1 1 0 011.15-.5l4 1V19a2 2 0 01-2 2h-4c-5.523 0-10-4.477-10-10V5z"></path></svg>
                </div>
                <h3 class="font-semibold text-lg text-gray-900">Téléphone</h3>
                <p class="text-sm text-gray-500">Du lundi au vendredi, 9h-18h : 01 23 45 67 89</p>
                <a href="tel:0123456789" class="w-full inline-block py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 transition duration-150">
                    Appeler maintenant
                </a>
            </div>
        </div>

        <div class="py-12">
            <div class="border-t border-gray-200"></div>
        </div>

        {{-- 4. Ressources utiles --}}
        <h2 class="text-xl font-bold text-gray-900 mb-6">Ressources utiles</h2>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            
            {{-- Lien 1: Guide d'utilisation --}}
            <a href="#" class="group p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition duration-150">
                <h3 class="font-semibold text-gray-900 group-hover:text-blue-600">Guide d'utilisation</h3>
                <p class="text-xs text-gray-500 mt-1">Découvrez toutes les fonctionnalités</p>
            </a>

            {{-- Lien 2: Devenir prestataire --}}
            <a href="{{ route('auth.register', ['tab' => 'register', 'accountType' => 'provider']) }}" class="group p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition duration-150">
                <h3 class="font-semibold text-gray-900 group-hover:text-blue-600">Devenir prestataire</h3>
                <p class="text-xs text-gray-500 mt-1">Créez votre profil professionnel</p>
            </a>
            
            {{-- Lien 3: Conditions d'utilisation --}}
            <a href="{{ route('politique.conditions') }}" class="group p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition duration-150">
                <h3 class="font-semibold text-gray-900 group-hover:text-blue-600">Conditions d'utilisation</h3>
                <p class="text-xs text-gray-500 mt-1">Nos règles et conditions</p>
            </a>

            {{-- Lien 4: Politique de confidentialité --}}
            <a href="{{ route('politique.privacy') }}" class="group p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition duration-150">
                <h3 class="font-semibold text-gray-900 group-hover:text-blue-600">Politique de confidentialité</h3>
                <p class="text-xs text-gray-500 mt-1">Protection de vos données</p>
            </a>
        </div>
        
    </div>
</div>

@endsection