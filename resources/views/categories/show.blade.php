@extends('layouts.app')

@section('content')

<div class="bg-white py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        
        {{-- Section des Résultats --}}
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-gray-900">{{ $prestataires->count() }} prestataire(s) trouvé(s) dans la catégorie {{ $category->name }}</h2>
            <p class="text-sm text-gray-500">Affichage 1-{{ $prestataires->count() }} sur {{ $prestataires->count() }}</p>
        </div>

        {{-- Grille des Cartes de Prestataires --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            
            @foreach($prestataires as $prestataire)
                <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition duration-300 overflow-hidden border border-gray-100">
                    {{-- Zone Image (Placeholder) --}}
                    <div class="relative h-48 bg-gray-200 flex items-center justify-center text-gray-500">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L15 14l5-5m-9 6l2 2m0-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>

                    <div class="p-4">
                        {{-- Nom et Note --}}
                        <div class="flex justify-between items-center mb-1">
                            <h3 class="text-lg font-bold text-gray-900">{{ $prestataire->name }} {{ $prestataire->surname }}</h3>
                        </div>

                        {{-- Catégorie et Localisation --}}
                        @if($prestataire->category)
                            <p class="text-sm text-gray-500 mb-1">{{ $prestataire->category->name }}</p>
                        @endif
                        <p class="text-sm text-gray-500 mb-3">{{ $prestataire->ville }}</p>

                        {{-- Prix et Contact --}}
                        <div class="flex justify-between items-center pt-2 border-t border-gray-100">
                            <p class="text-lg font-bold text-blue-600">{{ $prestataire->telephone }}</p>
                            <a href="mailto:{{ $prestataire->email }}" class="text-blue-600 hover:text-blue-700 p-2 rounded-full border border-blue-100 hover:bg-blue-50 transition duration-150">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>

@endsection
