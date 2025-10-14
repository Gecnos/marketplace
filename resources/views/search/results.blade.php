@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold text-gray-900 mb-2">
        Prestataires trouvés pour <span class="text-blue-600">"{{ $query }}"</span>
    </h1>
    <p class="text-gray-600">La recherche a été effectuée sur le nom, l'entreprise et la catégorie des prestataires.</p>

    @if($results->count() > 0)
        <p class="text-gray-500 mb-8">{{ $results->count() }} prestataire(s) trouvé(s).</p>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($results as $prestataire)
                {{-- Carte de Prestataire --}}
                <div class="group bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 hover:shadow-xl transition duration-300">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 group-hover:text-blue-600 transition duration-300">{{ $prestataire->name }} {{ $prestataire->surname }}</h3>
                        <p class="text-sm text-gray-500 mb-2">{{ $prestataire->entreprise }}</p>
                        @if($prestataire->category)
                            <p class="text-sm text-gray-600 font-semibold mb-2">{{ $prestataire->category->name }}</p>
                        @endif
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
            <p class="text-lg text-gray-500">Aucun prestataire trouvé pour votre recherche.</p>
            <a href="{{ route('welcome') }}" class="mt-4 inline-block text-blue-600 hover:underline">Retour à l'accueil</a>
        </div>
    @endif
</div>
@endsection