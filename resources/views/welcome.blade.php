@extends('layouts.app')

@section('content')


<div class="relative bg-cover bg-center h-96" style="background-image: url('{{ asset('images/hero-background.jpg') }}');">
    <div class="absolute inset-0 bg-blue-900 opacity-70"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex flex-col justify-center items-center text-center">
        
        <h1 class="text-4xl sm:text-5xl font-extrabold text-white leading-tight mb-4">
            Trouvez les meilleurs <span class="text-yellow-400">prestataires locaux</span>
        </h1>
        <p class="text-xl text-gray-200 mb-8">
            Découvrez des professionnels de confiance près de chez vous
        </p>
        
        <form action="{{ route('search.results') }}" method="GET" class="w-full max-w-3xl flex bg-white rounded-lg shadow-xl overflow-hidden p-1">
            <input type="text" name="query" placeholder="Quel service recherchez-vous ?" 
                   class="w-full px-5 py-3 text-lg border-none focus:ring-0" required>
            <button type="submit" 
                    class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-3 px-8 rounded-lg transition duration-150 flex items-center space-x-2">
                Rechercher
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M21.71 20.29l-3.57-3.57A9.99 9.99 0 1010 20c2.25 0 4.34-.78 6.03-2.09l3.57 3.57a1 1 0 001.41 0 1 1 0 000-1.41zM4 10a6 6 0 1112 0 6 6 0 01-12 0z"/></svg>
            </button>
        </form>
    </div>
</div>


<div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-gray-900">Explorez nos catégories</h2>
        <p class="text-gray-500">Des professionnels qualifiés dans tous les domaines</p>
    </div>

    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
        @if(isset($categories))
            @foreach($categories as $category)
            {{-- Carte de Catégorie --}}
                                                <a href="{{ route('categories.show', $category->slug) }}" class="group bg-white rounded-xl shadow-lg hover:shadow-xl transition duration-300 p-4 text-center border border-gray-100">
                <div class="flex justify-center mb-3">
                    <div class="w-16 h-16 flex items-center justify-center bg-blue-100 rounded-xl group-hover:bg-blue-600 text-blue-600 group-hover:text-white transition duration-300">
                        <span class="text-xl font-bold">{{ strtoupper(substr($category->name, 0, 2)) }}</span>
                    </div>
                </div>
                <h3 class="font-semibold text-gray-900 group-hover:text-blue-600 transition duration-300">{{ $category->name }}</h3>
                                <p class="text-xs text-gray-500 mt-1">{{ $category->prestataires_count }} prestataires</p>
            </a>
            @endforeach
        @else
            {{-- Exemple de carte si $categories n'est pas définie (pour le design) --}}
            @php $placeholders = ['Beauté & Coiffure', 'Mode & Couture', 'Bien-être & Spa', 'Bricolage & Réparation', 'Automobile', 'Informatique']; @endphp
            @foreach($placeholders as $p)
                <div class="bg-white rounded-xl shadow-lg p-4 text-center border border-gray-100 opacity-70">
                    <div class="flex justify-center mb-3">
                        <div class="p-4 rounded-xl bg-gray-100 text-gray-400">
                            <svg class="h-8 w-8" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2a10 10 0 1010 10A10 10 0 0012 2zm0 18a8 8 0 118-8 8 8 0 01-8 8z"/><path d="M11 7h2v6h-2zM11 15h2v2h-2z"/></svg>
                        </div>
                    </div>
                    <h3 class="font-semibold text-gray-900">{{ $p }}</h3>
                    <p class="text-xs text-gray-500 mt-1">XXX prestataires</p>
                </div>
            @endforeach
        @endif
    </div>
</div>


<div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center mb-8">
        <h2 class="text-2xl font-bold text-gray-900">Prestataires recommandés</h2>
        <a href="{{ route('search.results') }}" class="text-blue-600 hover:text-blue-700 font-medium flex items-center space-x-1">
            <span>Voir plus</span>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
        </a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @if(isset($prestatairesRecommandes))
            @foreach($prestatairesRecommandes as $prestataire)
            {{-- Carte de Prestataire --}}
            <a href="{{ route('prestataires.show', $prestataire->slug) }}" class="group bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 hover:shadow-xl transition duration-300">
                <div class="relative h-48">
                    <img class="w-full h-full object-cover" src="{{ asset($prestataire->image_url) }}" alt="{{ $prestataire->name }}">
                    <span class="absolute top-2 right-2 bg-green-500 text-white text-xs font-semibold px-2 py-1 rounded-full">RECOMMANDE</span>
                </div>
                <div class="p-4">
                    <h3 class="text-xl font-bold text-gray-900 group-hover:text-blue-600 transition duration-300">{{ $prestataire->name }}</h3>
                    <p class="text-sm text-gray-500 mb-2">{{ $prestataire->category_name }}</p>
                    <div class="flex items-center space-x-1 text-yellow-500 text-sm mb-3">
                        <span class="font-bold">{{ number_format($prestataire->rating, 1) }}</span>
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.636-.921 1.935 0l1.256 3.864 4.06.66c.96.155 1.343 1.353.644 1.993l-2.94 2.858.694 4.048c.164.954-.836 1.693-1.688 1.22L10 15.347l-3.64 1.928c-.852.473-1.852-.266-1.688-1.22l.694-4.048-2.94-2.858c-.699-.64-.316-1.838.644-1.993l4.06-.66L9.049 2.927z"/></svg>
                        <span class="text-gray-500">({{ $prestataire->review_count }})</span>
                    </div>
                    <div class="flex justify-between items-center pt-2 border-t border-gray-100">
                        <p class="text-lg font-bold text-blue-600">{{ $prestataire->price_range }}</p>
                        <button class="text-gray-400 hover:text-red-500 transition duration-150">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                        </button>
                    </div>
                </div>
            </a>
            @endforeach
        @else
            {{-- Placeholder cards for visual context if data is empty --}}
            @for ($i = 0; $i < 3; $i++)
                <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 opacity-70">
                    <div class="h-48 bg-gray-200"></div>
                    <div class="p-4 space-y-3">
                        <div class="h-6 bg-gray-300 rounded w-3/4"></div>
                        <div class="h-4 bg-gray-200 rounded w-1/2"></div>
                        <div class="h-4 bg-gray-200 rounded w-1/3"></div>
                        <div class="flex justify-between items-center pt-2 border-t border-gray-100">
                            <div class="h-6 bg-blue-200 rounded w-1/4"></div>
                            <div class="h-6 w-6 bg-gray-300 rounded-full"></div>
                        </div>
                    </div>
                </div>
            @endfor
        @endif
    </div>
</div>


<div class="bg-blue-600 py-16 mt-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
        <h2 class="text-3xl font-extrabold mb-3">Vous êtes un prestataire ?</h2>
        <p class="text-xl text-blue-100 mb-6">Rejoignez notre plateforme et développez votre clientèle locale</p>
        <a href="{{ route('auth.register', ['tab' => 'register', 'accountType' => 'provider']) }}" 
           class="inline-block py-3 px-8 border border-white rounded-lg shadow-md text-sm font-semibold text-white bg-transparent hover:bg-white hover:text-blue-600 transition duration-300">
           Créer mon profil prestataire
        </a>
    </div>
</div>

@endsection