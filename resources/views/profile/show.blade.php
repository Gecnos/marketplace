@extends('layouts.app')

@section('content')
<div class="bg-gray-100 py-8 sm:py-12">
    <div class="max-w-xl md:max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            {{-- En-tête du profil --}}
            <div class="p-6 sm:p-8 bg-cover bg-center relative" style="background-image: url('https://via.placeholder.com/800x300/cccccc/374151?text=Profil');">
                <div class="absolute inset-0 bg-black opacity-50"></div>
                <div class="relative z-10 flex flex-col sm:flex-row items-center sm:items-start space-y-4 sm:space-y-0 sm:space-x-6">
                    <img class="h-20 w-20 sm:h-24 sm:w-24 rounded-full object-cover border-4 border-white shadow-lg" src="https://via.placeholder.com/150/007bff/ffffff?text={{ substr($provider->name, 0, 1) }}" alt="{{ $provider->name }}">
                    <div class="text-center sm:text-left">
                        <h1 class="text-2xl sm:text-3xl font-bold text-white shadow-sm">{{ $provider->entreprise ?? $provider->name }}</h1>
                        <p class="text-base sm:text-lg text-gray-200 shadow-sm">{{ $provider->category->name ?? 'Catégorie non définie' }}</p>
                    </div>
                </div>
            </div>

            {{-- Corps du profil --}}
            <div class="p-6 sm:p-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    {{-- Colonne principale --}}
                    <div class="md:col-span-2 space-y-8">
                        {{-- Description --}}
                        <div>
                            <h2 class="text-xl font-bold text-gray-800 mb-4">À propos de nous</h2>
                            <p class="text-gray-700 leading-relaxed">{{ $provider->description ?? 'Aucune description n\'a été fournie par ce prestataire.' }}</p>
                        </div>

                        {{-- Galerie --}}
                        <div>
                            <h2 class="text-xl font-bold text-gray-800 mb-4">Galerie</h2>
                            @if($provider->media->where('collection_name', 'gallery')->isNotEmpty())
                                <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                                    @foreach($provider->media->where('collection_name', 'gallery') as $media)
                                        <div class="rounded-lg overflow-hidden shadow-md">
                                            <img src="{{ $media->url }}" alt="{{ $media->file_name }}" class="w-full h-40 object-cover">
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-gray-500">Ce prestataire n'a pas encore ajouté de photos.</p>
                            @endif
                        </div>

                        {{-- Avis --}}
                        <div>
                            <h2 class="text-xl font-bold text-gray-800 mb-4">Avis des clients ({{ $provider->reviews->count() }})</h2>
                            <div class="space-y-6">
                                @forelse($provider->reviews as $review)
                                    <div class="border-b pb-4">
                                        <div class="flex items-start">
                                            <div class="font-semibold text-gray-800">{{ $review->author->name ?? 'Anonyme' }}</div>
                                            <div class="ml-auto flex items-center text-yellow-500">
                                                {{ $review->rating }}/5 <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.636-.921 1.935 0l1.256 3.864 4.06.66c.96.155 1.343 1.353.644 1.993l-2.94 2.858.694 4.048c.164.954-.836 1.693-1.688 1.22L10 15.347l-3.64 1.928c-.852.473-1.852-.266-1.688-1.22l.694-4.048-2.94-2.858c-.699-.64-.316-1.838.644-1.993l4.06-.66L9.049 2.927z"></path></svg>
                                            </div>
                                        </div>
                                        <p class="text-gray-600 mt-2">{{ $review->content }}</p>
                                        <p class="text-xs text-gray-400 mt-2">{{ $review->created_at->diffForHumans() }}</p>
                                    </div>
                                @empty
                                    <p class="text-gray-500">Aucun avis pour le moment.</p>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    {{-- Colonne latérale --}}
                    <div class="space-y-6">
                        <div class="bg-gray-50 p-6 rounded-lg border">
                            <h3 class="text-lg font-bold text-gray-800 mb-4">Informations de contact</h3>
                            <div class="space-y-3">
                                <p class="flex items-center text-gray-700"><svg class="w-5 h-5 mr-3 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg> {{ $provider->ville }}</p>
                                <p class="flex items-center text-gray-700"><svg class="w-5 h-5 mr-3 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.5l1 4a1 1 0 01-.5 1.15L7.5 9.5a11.002 11.002 0 005 5l.85-1.5a1 1 0 011.15-.5l4 1V19a2 2 0 01-2 2h-4c-5.523 0-10-4.477-10-10V5z"></path></svg> {{ $provider->telephone }}</p>
                                <p class="flex items-center text-gray-700"><svg class="w-5 h-5 mr-3 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg> {{ $provider->email }}</p>
                            </div>
                        </div>
                        <div class="text-center">
                            <button class="w-full bg-blue-600 text-white font-bold py-3 px-6 rounded-lg hover:bg-blue-700 transition duration-300">Contacter ce prestataire</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection