@extends('layouts.app')

@section('content')




{{-- Styles pour les badges et boutons --}}
<style>
    .badge-verified { @apply inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800; }
    .badge-premium { @apply inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800; }
    .btn-secondary { @apply flex items-center px-4 py-2 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition duration-150; }
    .btn-primary { @apply flex items-center px-4 py-2 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150; }
    .star-filled { @apply text-yellow-500; }
    .star-empty { @apply text-gray-300; }
</style>

{{-- Structure Principale du Dashboard avec Alpine.js pour les onglets --}}
<div class="bg-gray-50 py-12 min-h-screen" x-data="{ activeTab: 'avis' }"> {{-- Mis à 'avis' pour l'exemple --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- 1. En-tête du Profil et Stats Clés (Basé sur l'image) --}}
        <div class="bg-white rounded-xl shadow-lg p-6 mb-8 border border-gray-100">
            {{-- ... (Code de l'en-tête du profil : photo, nom, badges, boutons) ... --}}
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                
                {{-- Informations principales --}}
                <div class="flex items-start space-x-4">
                    <img class="h-20 w-20 rounded-full object-cover border-2 border-gray-200" src="https://via.placeholder.com/150/007bff/ffffff?text=SE" alt="{{ $provider['name'] }}">
                    <div>
                        <div class="flex items-center space-x-2">
                            <h1 class="text-2xl font-bold text-gray-900">{{ $provider['name'] }}</h1>
                            @if($provider['is_verified']) <span class="badge-verified">Vérifié</span> @endif
                            @if($provider['is_premium']) <span class="badge-premium">Premium</span> @endif
                        </div>
                        <p class="text-sm text-gray-600 mt-0.5">{{ $provider['category'] }}</p>
                        <span class="flex items-center text-yellow-500 text-sm">
                            {{ number_format($provider['rating'], 1) }} <svg class="w-4 h-4 ml-0.5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.636-.921 1.935 0l1.256 3.864 4.06.66c.96.155 1.343 1.353.644 1.993l-2.94 2.858.694 4.048c.164.954-.836 1.693-1.688 1.22L10 15.347l-3.64 1.928c-.852.473-1.852-.266-1.688-1.22l.694-4.048-2.94-2.858c-.699-.64-.316-1.838.644-1.993l4.06-.66L9.049 2.927z"></path></svg>
                            <span class="text-gray-500 ml-1">({{ $provider['reviews_count'] }} avis)</span>
                        </span>
                    </div>
                </div>
                {{-- Boutons d'action --}}
                <div class="flex space-x-3 mt-4 md:mt-0">
                    <a href="{{ route('provider.profile', ['user' => $provider['id']]) }}" class="btn-secondary" target="_blank">Voir mon profil</a>
                    <button @click="activeTab = 'paramètres'" class="btn-primary">Modifier</button>
                </div>
            </div>

            {{-- 2. Statistiques clés --}}
            <div class="mt-6 border-t border-gray-100 pt-6 grid grid-cols-2 lg:grid-cols-4 gap-6">
                @php
                    // Petit helper pour les stats pour la lisibilité
                    function stat_card($title, $value, $change, $icon, $change_color) {
                        return "<div class=\"bg-white p-2 rounded-lg flex justify-between items-center border border-gray-100\">
                            <div>
                                <p class=\"text-sm font-medium text-gray-500\">$title</p>
                                <p class=\"text-xl font-bold text-gray-900 mt-1\">$value</p>
                                <p class=\"text-xs $change_color mt-1\">$change</p>
                            </div>
                            <div class=\"p-2 rounded-full bg-blue-100 text-blue-600\">
                                <svg class=\"w-5 h-5\" fill=\"none\" stroke=\"currentColor\" viewBox=\"0 0 24 24\" xmlns=\"http://www.w3.org/2000/svg\"><path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z\"></path></svg>
                            </div>
                        </div>";
                    }
                @endphp
                {{-- Stats Cards --}}
                {!! stat_card('Vues ce mois', $provider['stats']['views_month'], $provider['stats']['views_change'].' vs mois dernier', 'eye', 'text-green-600') !!}
                {!! stat_card('Contacts ce mois', $provider['stats']['contacts_month'], $provider['stats']['contacts_change'].' vs mois dernier', 'phone', 'text-green-600') !!}
                {!! stat_card('Taux de conversion', $provider['stats']['conversion_rate'], 'Contacts / Vues', 'chart', 'text-gray-500') !!}
                {!! stat_card('Temps de réponse', $provider['stats']['response_time'], '95% de réponses', 'time', 'text-gray-500') !!}
            </div>

        </div>

        {{-- 3. Navigation par Onglets --}}
        <div class="bg-white rounded-xl shadow-lg border border-gray-100">
            <nav class="flex space-x-4 border-b border-gray-200 px-6 pt-4">
                @foreach(['Statistiques', 'Profil', 'Galerie', 'Avis', 'Paramètres'] as $tab)
                    @php $slug = strtolower($tab); @endphp
                    <button @click="activeTab = '{{ $slug }}'"
                            :class="{
                                'border-blue-600 text-blue-600 font-semibold': activeTab === '{{ $slug }}',
                                'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': activeTab !== '{{ $slug }}'
                            }"
                            class="py-3 px-1 border-b-2 text-sm focus:outline-none transition duration-150">
                        {{ $tab }}
                    </button>
                @endforeach
            </nav>

            {{-- 4. Contenu des Onglets --}}
            <div class="p-6">
                
                {{-- Contenu de l'Onglet: Statistiques --}}
                <div x-show="activeTab === 'statistiques'" x-cloak>
                    <h2 class="text-xl font-bold text-gray-900 mb-4">Évolution des données</h2>

                    {{-- Graphiques (Placeholders) --}}
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-10">
                        {{-- Graphique Ligne: Vues --}}
                        <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                            <h3 class="font-semibold text-gray-800 mb-4">Vues du profil (6 derniers mois)</h3>
                            <div class="h-64 flex items-center justify-center bg-white rounded border border-gray-200">
                                <p class="text-sm text-gray-500">Placeholder Chart.js: Évolution des Vues</p>
                            </div>
                        </div>
                        {{-- Graphique Barres: Contacts --}}
                        <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                            <h3 class="font-semibold text-gray-800 mb-4">Contacts reçus (6 derniers mois)</h3>
                            <div class="h-64 flex items-center justify-center bg-white rounded border border-gray-200">
                                <p class="text-sm text-gray-500">Placeholder Chart.js: Contacts mensuels</p>
                            </div>
                        </div>
                    </div>
                    
                    {{-- Complétude du profil --}}
                    <h2 class="text-xl font-bold text-gray-900 mb-4">Complétude du profil ({{ $provider['profile_completion']['score'] }}%)</h2>
                    
                    {{-- Barre de progression --}}
                    <div class="mb-6">
                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                            <div class="bg-blue-600 h-2.5 rounded-full" style="width: {{ $provider['profile_completion']['score'] }}%"></div>
                        </div>
                    </div>
                    
                    {{-- Liste des tâches --}}
                    <ul class="space-y-4">
                        @foreach($provider['profile_completion']['tasks'] as $task)
                            <li class="flex items-center justify-between border-b border-gray-100 pb-4 last:border-b-0 last:pb-0">
                                <div class="flex items-center">
                                    @if($task['done'])
                                        <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    @else
                                        <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    @endif
                                    <span class="text-sm text-gray-700">{{ $task['label'] }}</span>
                                </div>
                                <span class="text-sm font-semibold text-gray-500">+{{ $task['points'] }} pts</span>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Contenu de l'Onglet: Profil --}}
                <div x-show="activeTab === 'profil'" x-cloak>
                    <h2 class="text-xl font-bold text-gray-900 mb-4">Informations du profil</h2>

                    {{-- Bloc Description --}}
                    <div class="mb-6">
                        <h3 class="font-bold text-lg text-gray-900 mb-2">Description</h3>
                        <p class="text-gray-700 leading-relaxed">{{ $provider['description'] }}</p>
                    </div>

                    {{-- Bloc Contact et Statut --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-4 gap-x-12">
                        
                        {{-- Contact --}}
                        <div>
                            <h3 class="font-bold text-lg text-gray-900 mb-2">Contact</h3>
                            <div class="space-y-1">
                                <p class="text-sm text-gray-700 flex items-center">
                                    <svg class="w-4 h-4 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.5l1 4a1 1 0 01-.5 1.15L7.5 9.5a11.002 11.002 0 005 5l.85-1.5a1 1 0 011.15-.5l4 1V19a2 2 0 01-2 2h-4c-5.523 0-10-4.477-10-10V5z"></path></svg>
                                    {{ $provider['phone'] }}
                                </p>
                                <p class="text-sm text-gray-700 flex items-center">
                                    <svg class="w-4 h-4 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                    {{ $provider['email'] }}
                                </p>
                            </div>
                        </div>

                        {{-- Statut --}}
                        <div>
                            <h3 class="font-bold text-lg text-gray-900 mb-2">Statuts</h3>
                            <div class="space-y-1">
                                <p class="text-sm flex justify-between items-center text-gray-700">
                                    <span>Vérifié</span>
                                    <span class="text-green-600 font-semibold">Oui</span>
                                </p>
                                <p class="text-sm flex justify-between items-center text-gray-700">
                                    <span>Premium</span>
                                    <span class="px-3 py-1 text-xs font-semibold text-white bg-blue-600 rounded-full">Actif</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Contenu de l'Onglet: Galerie --}}
                <div x-show="activeTab === 'galerie'" x-cloak>
                    <h2 class="text-xl font-bold text-gray-900 mb-6">Gestion de la Galerie</h2>

                    {{-- Formulaire d'ajout --}}
                    <div class="bg-gray-50 border border-dashed border-gray-300 rounded-lg p-6 mb-8">
                        <form action="{{ route('provider.gallery.upload') }}" method="POST" enctype="multipart/form-data" class="flex flex-col md:flex-row items-center md:space-x-6">
                            @csrf
                            <div class="flex-grow mb-4 md:mb-0">
                                <label for="photo" class="block text-sm font-medium text-gray-700">Ajouter une nouvelle photo</label>
                                <input type="file" name="photo" id="photo" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"/>
                                @error('photo')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit" class="btn-primary w-full md:w-auto">Télécharger</button>
                        </form>
                    </div>

                    @if(session('success'))
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                            <p>{{ session('success') }}</p>
                        </div>
                    @endif

                    {{-- Galerie existante --}}
                    @if(count($provider['gallery']) > 0)
                        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6">
                            @foreach($provider['gallery'] as $media)
                                <div class="relative bg-gray-100 rounded-lg overflow-hidden shadow-md group">
                                    <img src="{{ $media['url'] }}" alt="{{ $media['alt'] }}" 
                                         class="w-full h-48 object-cover transition duration-300 group-hover:opacity-75">
                                </div>
                            @endforeach
                        </div>
                    @else
                        {{-- Message si aucune photo --}}
                        <div class="text-center py-12 bg-white rounded-lg border">
                            <p class="mt-1 text-sm text-gray-500">
                                Ajoutez des photos de vos réalisations pour attirer plus de clients.
                            </p>
                        </div>
                    @endif
                </div>

                {{-- Contenu de l'Onglet: Avis (Nouveau contenu basé sur image_029982.jpg) --}}
                <div x-show="activeTab === 'avis'" x-cloak>
                    <h2 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                        Avis clients ({{ count($provider['reviews']) }})
                        <span class="ml-4 flex items-center text-yellow-500">
                            {{ number_format($provider['rating'], 1) }}
                            <svg class="w-5 h-5 ml-1" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.636-.921 1.935 0l1.256 3.864 4.06.66c.96.155 1.343 1.353.644 1.993l-2.94 2.858.694 4.048c.164.954-.836 1.693-1.688 1.22L10 15.347l-3.64 1.928c-.852.473-1.852-.266-1.688-1.22l.694-4.048-2.94-2.858c-.699-.64-.316-1.838.644-1.993l4.06-.66L9.049 2.927z"/></svg>
                        </span>
                    </h2>

                    <div class="space-y-6">
                        @foreach($provider['reviews'] as $review)
                            <div class="bg-white p-5 border border-gray-200 rounded-lg shadow-sm">
                                <div class="flex items-start space-x-4">
                                    {{-- Initiales de l'auteur (Placeholder) --}}
                                    <div class="flex-shrink-0 w-10 h-10 rounded-full bg-blue-500 flex items-center justify-center text-white font-semibold text-lg">
                                        {{ substr($review['author'], 0, 1) }}
                                    </div>
                                    
                                    <div class="flex-grow">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <p class="font-semibold text-gray-900">{{ $review['author'] }}</p>
                                                <div class="flex items-center text-sm text-gray-500 mt-0.5">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <svg class="w-4 h-4 {{ $i <= $review['rating'] ? 'star-filled' : 'star-empty' }}" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.636-.921 1.935 0l1.256 3.864 4.06.66c.96.155 1.343 1.353.644 1.993l-2.94 2.858.694 4.048c.164.954-.836 1.693-1.688 1.22L10 15.347l-3.64 1.928c-.852.473-1.852-.266-1.688-1.22l.694-4.048-2.94-2.858c-.699-.64-.316-1.838.644-1.993l4.06-.66L9.049 2.927z"/></svg>
                                                    @endfor
                                                    <span class="ml-2">{{ $review['service'] }}</span>
                                                    <span class="mx-2 text-gray-300">•</span>
                                                    <span>{{ $review['date'] }}</span>
                                                </div>
                                            </div>
                                            @if($review['is_verified'])
                                                <span class="badge-verified text-xs">Vérifié</span>
                                            @endif
                                        </div>
                                        
                                        <p class="mt-2 text-gray-700">{{ $review['content'] }}</p>

                                        <div class="mt-3 flex items-center space-x-4 text-sm text-gray-500">
                                            <button class="flex items-center hover:text-blue-600 transition">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                                                Répondre
                                            </button>
                                            <span class="flex items-center">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h-2m4 0h-2m-2 0h-2m-2 0H6m-3 0h18M5 15h14M10 5l4-2 4 2 2 4 0 6 0 2-4 2-4-2-2-4 0-6z"></path></svg>
                                                Utile ({{ $review['helpful'] }})
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                
                {{-- Contenu de l'Onglet: Paramètres --}}
                <div x-show="activeTab === 'paramètres'" x-cloak>
                    <h2 class="text-xl font-bold text-gray-900 mb-6">Paramètres du profil</h2>
                    
                    @if(session('success'))
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                            <p>{{ session('success') }}</p>
                        </div>
                    @endif

                    <form action="{{ route('provider.settings.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="space-y-6">
                            {{-- Nom de l'entreprise --}}
                            <div>
                                <label for="entreprise" class="block text-sm font-medium text-gray-700">Nom de l'entreprise</label>
                                <input type="text" name="entreprise" id="entreprise" value="{{ old('entreprise', $user->entreprise) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                            </div>

                            {{-- Prénom et Nom --}}
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700">Prénom</label>
                                    <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                </div>
                                <div>
                                    <label for="surname" class="block text-sm font-medium text-gray-700">Nom</label>
                                    <input type="text" name="surname" id="surname" value="{{ old('surname', $user->surname) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                </div>
                            </div>

                            {{-- Email et Téléphone --}}
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700">Adresse e-mail</label>
                                    <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                </div>
                                <div>
                                    <label for="telephone" class="block text-sm font-medium text-gray-700">Téléphone</label>
                                    <input type="text" name="telephone" id="telephone" value="{{ old('telephone', $user->telephone) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                </div>
                            </div>

                            {{-- Ville --}}
                            <div>
                                <label for="ville" class="block text-sm font-medium text-gray-700">Ville</label>
                                <input type="text" name="ville" id="ville" value="{{ old('ville', $user->ville) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                            </div>

                            {{-- Description --}}
                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                <textarea name="description" id="description" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">{{ old('description', $user->description) }}</textarea>
                            </div>
                        </div>

                        <div class="mt-8 flex justify-end">
                            <button type="submit" class="btn-primary">Enregistrer les modifications</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </div>
</div>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const chartData = {{ Js::from($provider['chart_data']) }};

        // Graphique des vues
        const viewsCtx = document.getElementById('viewsChart').getContext('2d');
        new Chart(viewsCtx, {
            type: 'line',
            data: {
                labels: chartData.labels,
                datasets: [{
                    label: 'Vues',
                    data: chartData.views,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1,
                    fill: false
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Graphique des contacts
        const contactsCtx = document.getElementById('contactsChart').getContext('2d');
        new Chart(contactsCtx, {
            type: 'bar',
            data: {
                labels: chartData.labels,
                datasets: [{
                    label: 'Contacts',
                    data: chartData.contacts,
                    backgroundColor: 'rgb(153, 102, 255)',
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
@endpush