@extends('layouts.app')

@section('content')

<div class="bg-gray-50 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- En-tête de la Page --}}
        <header class="text-center mb-10">
            <h1 class="text-3xl font-extrabold text-gray-900 mb-2">
                Prestataires en <span class="text-blue-600">{{ $category->name }}</span>
            </h1>
            <p class="text-md text-gray-500">
                Découvrez tous nos prestataires locaux pour la catégorie {{ $category->name }}.
            </p>
        </header>

        {{-- Grille des Prestataires --}}
        @if($category->prestataires->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($category->prestataires as $prestataire)
                    {{-- Carte de Prestataire --}}
                    <div class="group bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 hover:shadow-xl transition duration-300">
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 group-hover:text-blue-600 transition duration-300">{{ $prestataire->name }} {{ $prestataire->surname }}</h3>
                            <p class="text-sm text-gray-500 mb-2">{{ $prestataire->entreprise }}</p>
                            <div class="flex items-center space-x-1 text-yellow-500 text-sm mb-3">
                                <span class="text-gray-500">{{ $prestataire->ville }}</span>
                            </div>
                            <div class="flex justify-between items-center pt-4 border-t border-gray-100">
                                <p class="text-lg font-bold text-blue-600">{{ $prestataire->telephone }}</p>
                                <a href="mailto:{{ $prestataire->email }}" class="text-gray-400 hover:text-blue-500 transition duration-150">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-16">
                <p class="text-lg text-gray-500">Il n'y a pas encore de prestataires dans cette catégorie.</p>
            </div>
        @endif
    </div>
</div>

@endsection
