@extends('layouts.app')

@section('content')

<div class="bg-gray-50 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- En-tête de la Page --}}
        <header class="text-center mb-10">
            <h1 class="text-3xl font-extrabold text-gray-900 mb-2">Toutes les catégories</h1>
            <p class="text-md text-gray-500">
                Découvrez tous nos prestataires locaux classés par domaine d'activité
            </p>
        </header>

        {{-- Grille des Catégories --}}
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($categories as $category)
                {{-- Carte de Catégorie --}}
                <a href="{{ route('categories.show', $category->slug) }}" 
                   class="group bg-white rounded-xl shadow-lg hover:shadow-xl transition duration-300 p-6 text-center border border-gray-100 flex flex-col items-center justify-center space-y-2">
                    
                    {{-- Icône --}}
                    <div class="p-4 rounded-full bg-blue-100 group-hover:bg-blue-600 text-blue-600 group-hover:text-white transition duration-300 mb-2">
                        <span class="text-xl font-bold">{{ strtoupper(substr($category->name, 0, 2)) }}</span>
                    </div>

                    <h3 class="font-bold text-gray-900 group-hover:text-blue-600 transition duration-300">{{ $category->name }}</h3>
                    <p class="text-sm font-semibold text-blue-600 mt-1">{{ $category->prestataires_count }} prestataires</p>
                </a>
            @endforeach
        </div>
    </div>
</div>

@endsection
