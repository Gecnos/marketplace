@extends('layouts.app')

@section('content')
    <div class="bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">

            {{-- En-tête de la Page --}}
            <header class="text-center mb-16">
                <h1 class="text-4xl font-extrabold text-gray-900 mb-4">À propos de ServicesLocaux</h1>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                    La plateforme qui connecte les habitants avec les meilleurs prestataires locaux. Notre mission est de
                    valoriser le savoir-faire local et faciliter l'accès aux services de proximité.
                </p>
            </header>

            {{-- Statistiques Clés (Grid) --}}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-20 text-center">

                {{-- Stat 1: Prestataires Inscrits --}}
                <div class="p-6 bg-blue-50 rounded-xl shadow-md border border-blue-100">
                    <p class="text-3xl font-extrabold text-blue-600">1,200+</p>
                    <p class="text-sm text-gray-600 mt-1">Prestataires inscrits</p>
                </div>

                {{-- Stat 2: Services Proposés --}}
                <div class="p-6 bg-blue-50 rounded-xl shadow-md border border-blue-100">
                    <p class="text-3xl font-extrabold text-blue-600">50+</p>
                    <p class="text-sm text-gray-600 mt-1">Services proposés</p>
                </div>

                {{-- Stat 3: Avis Positifs --}}
                <div class="p-6 bg-blue-50 rounded-xl shadow-md border border-blue-100">
                    <p class="text-3xl font-extrabold text-blue-600">98%</p>
                    <p class="text-sm text-gray-600 mt-1">Avis positifs</p>
                </div>

                {{-- Stat 4: Clients Satisfaits --}}
                <div class="p-6 bg-blue-50 rounded-xl shadow-md border border-blue-100">
                    <p class="text-3xl font-extrabold text-blue-600">5,000+</p>
                    <p class="text-sm text-gray-600 mt-1">Clients satisfaits</p>
                </div>
            </div>

            {{-- 2. Notre Histoire (Two Columns) --}}
            <section class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-20">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Notre histoire</h2>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        ServicesLocaux est né d'un constat simple : il était difficile de trouver des prestataires de
                        confiance près de chez soi. Nous voulions créer un moyen simple et fiable de découvrir un bon
                        coiffeur, un couturier talentueux ou un mécanicien honnête.
                    </p>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        Nous avons créé cette plateforme pour donner une visibilité aux artisans et prestataires locaux,
                        tout en offrant aux clients un moyen simple et sécurisé de les découvrir et les contacter.
                    </p>
                    <p class="text-gray-700 leading-relaxed font-semibold">
                        Aujourd'hui, nous sommes fiers de compter plus de 1,200 prestataires dans toute la région et d'avoir
                        facilité des milliers de mises en relation.
                    </p>
                </div>
                {{-- Placeholder Image / Illustration --}}
                <div class="h-64 bg-gray-200 rounded-xl shadow-lg flex items-center justify-center text-gray-500">
                </div>
            </section>

            {{-- 3. Nos Valeurs (Grid) --}}
            <section class="text-center mb-20">
                <h2 class="text-3xl font-bold text-gray-900 mb-10">Nos valeurs</h2>

                <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">

                    {{-- Valeur 1: Proximité --}}
                    <div class="p-6 bg-white rounded-xl shadow-lg border border-gray-100">
                        <h3 class="text-xl font-bold text-blue-600 mb-3">Proximité</h3>
                        <p class="text-sm text-gray-700">
                            Nous mettons en relation les habitants avec des prestataires locaux de confiance.
                        </p>
                    </div>

                    {{-- Valeur 2: Qualité --}}
                    <div class="p-6 bg-white rounded-xl shadow-lg border border-gray-100">
                        <h3 class="text-xl font-bold text-blue-600 mb-3">Qualité</h3>
                        <p class="text-sm text-gray-700">
                            Tous nos prestataires sont sélectionnés et évalués par notre communauté.
                        </p>
                    </div>

                    {{-- Valeur 3: Transparence --}}
                    <div class="p-6 bg-white rounded-xl shadow-lg border border-gray-100">
                        <h3 class="text-xl font-bold text-blue-600 mb-3">Transparence</h3>
                        <p class="text-sm text-gray-700">
                            Prix indicatifs affichés, avis clients authentiques et informations vérifiées.
                        </p>
                    </div>

                    {{-- Valeur 4: Simplicité --}}
                    <div class="p-6 bg-white rounded-xl shadow-lg border border-gray-100">
                        <h3 class="text-xl font-bold text-blue-600 mb-3">Simplicité</h3>
                        <p class="text-sm text-gray-700">
                            Une plateforme intuitive pour trouver rapidement le bon prestataire.
                        </p>
                    </div>
                </div>
            </section>

            {{-- 4. Comment ça marche (Steps) --}}
            <section class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-12">Comment ça marche</h2>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-12">

                    {{-- Étape 1: Recherchez --}}
                    <div class="flex flex-col items-center">
                        <div
                            class="flex items-center justify-center h-12 w-12 rounded-full bg-blue-600 text-white text-xl font-bold mb-4">
                            1</div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Recherchez</h3>
                        <p class="text-sm text-gray-700 max-w-xs">
                            Parcourez les catégories ou utilisez la recherche pour trouver le service dont vous avez besoin.
                        </p>
                    </div>

                    {{-- Ligne de séparation (Invisible sur mobile) --}}
                    <div class="hidden md:block relative">
                        <div class="absolute inset-x-0 top-6 h-0.5 bg-gray-200"></div>
                    </div>

                    {{-- Étape 2: Comparez --}}
                    <div class="flex flex-col items-center">
                        <div
                            class="flex items-center justify-center h-12 w-12 rounded-full bg-blue-600 text-white text-xl font-bold mb-4">
                            2</div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Comparez</h3>
                        <p class="text-sm text-gray-700 max-w-xs">
                            Consultez les profils, avis clients et prix indicatifs pour faire votre choix.
                        </p>
                    </div>

                    {{-- Ligne de séparation (Invisible sur mobile) --}}
                    <div class="hidden md:block relative">
                        <div class="absolute inset-x-0 top-6 h-0.5 bg-gray-200"></div>
                    </div>

                    {{-- Étape 3: Contactez --}}
                    <div class="flex flex-col items-center">
                        <div
                            class="flex items-center justify-center h-12 w-12 rounded-full bg-blue-600 text-white text-xl font-bold mb-4">
                            3</div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Contactez</h3>
                        <p class="text-sm text-gray-700 max-w-xs">
                            Contactez directement le prestataire via téléphone ou WhatsApp pour prendre rendez-vous.
                        </p>
                    </div>
                </div>
            </section>

            {{-- Information Importante --}}
            <div class="bg-gray-100 p-6 rounded-lg text-center border border-gray-200">
                <h3 class="font-bold text-lg text-gray-900 mb-2">Information importante</h3>
                <p class="text-sm text-gray-600 leading-relaxed">
                    ServicesLocaux est une plateforme de mise en relation. Nous ne sommes pas responsables des transactions
                    entre clients et prestataires. Les prix affichés sont indicatifs et peuvent varier. Nous encourageons
                    nos utilisateurs à vérifier les détails directement avec les prestataires.
                </p>
            </div>

        </div>
    </div>

    {{-- Le pied de page (footer) est généralement inclus via le layout `layouts.app` --}}
    {{-- L'image montre le footer qui est disponible dans d'autres images (image_05d288.png) --}}
@endsection
