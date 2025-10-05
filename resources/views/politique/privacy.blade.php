@extends('layouts.app')

@section('content')

<div class="bg-white min-h-screen">
    <div class="max-w-4xl mx-auto py-12 px-4 sm:px-6 lg:px-8">

        {{-- En-tête de la Page --}}
        <header class="text-center mb-10">
            <h1 class="text-3xl font-extrabold text-gray-900 mb-2">Politique de confidentialité</h1>
            <p class="text-sm text-gray-500">
                Dernière mise à jour : 05 Octobre 2025
            </p>
        </header>

        {{-- Contenu de la Politique --}}
        <div class="space-y-12 text-gray-700">

            {{-- SECTION 1 : Introduction --}}
            <section>
                <h2 class="text-xl font-semibold text-blue-600 border-b border-blue-100 pb-2 mb-4">Introduction</h2>
                <p class="text-sm leading-relaxed">
                    Cette Politique de confidentialité décrit la manière dont ServicesLocaux ("nous", "notre", "nos") collecte, utilise et partage vos informations personnelles lorsque vous utilisez notre plateforme. Nous nous engageons à protéger votre vie privée et vos données. En utilisant nos services, vous acceptez les pratiques décrites dans cette politique.
                </p>
            </section>
            
            <hr class="border-gray-200">

            {{-- SECTION 2 : Collecte des données --}}
            <section>
                <h2 class="text-xl font-semibold text-blue-600 border-b border-blue-100 pb-2 mb-4">Collecte des données</h2>
                <h3 class="font-medium text-gray-800 mt-6 mb-2">Informations fournies directement</h3>
                <ul class="list-disc list-inside text-sm space-y-1 ml-4">
                    <li>Données d'identification : Nom, prénom, adresse e-mail, numéro de téléphone.</li>
                    <li>Données de profil prestataire : Nom de l'entreprise, catégorie de service, ville.</li>
                    <li>Données de paiement : Informations nécessaires au traitement des transactions (transmises à un prestataire de paiement sécurisé).</li>
                </ul>

                <h3 class="font-medium text-gray-800 mt-6 mb-2">Données collectées automatiquement</h3>
                <ul class="list-disc list-inside text-sm space-y-1 ml-4">
                    <li>Données de connexion : Adresse IP, type de navigateur, pages visitées.</li>
                    <li>Cookies et technologies similaires : Pour améliorer l'expérience utilisateur et les analyses de trafic.</li>
                </ul>
            </section>
            
            <hr class="border-gray-200">

            {{-- SECTION 3 : Utilisation des données --}}
            <section>
                <h2 class="text-xl font-semibold text-blue-600 border-b border-blue-100 pb-2 mb-4">Utilisation des données</h2>

                <h3 class="font-medium text-gray-800 mt-6 mb-2">Fonctionnalités principales</h3>
                <ul class="list-disc list-inside text-sm space-y-1 ml-4">
                    <li>Gestion de votre compte Client ou Prestataire.</li>
                    <li>Mise en relation et exécution des services demandés.</li>
                    <li>Communication relative aux transactions et services.</li>
                    <li>Personnalisation de l'expérience utilisateur.</li>
                </ul>

                <h3 class="font-medium text-gray-800 mt-6 mb-2">Base légale</h3>
                <p class="text-sm leading-relaxed">
                    Nous traitons vos données lorsque cela est nécessaire à l'exécution d'un contrat (service commandé), lorsque nous avons votre consentement, ou pour nos intérêts légitimes.
                </p>
            </section>
            
            <hr class="border-gray-200">

            {{-- SECTION 4 : Partage des données --}}
            <section>
                <h2 class="text-xl font-semibold text-blue-600 border-b border-blue-100 pb-2 mb-4">Partage des données</h2>
                <ul class="list-disc list-inside text-sm space-y-1 ml-4">
                    <li>Avec les prestataires : Pour permettre l'exécution des services (nom, téléphone, description du besoin).</li>
                    <li>Prestataires de services tiers : Hébergement, paiement, analyse.</li>
                    <li>Obligations légales : Si requis par la loi ou une décision de justice.</li>
                </ul>
            </section>
            
            <hr class="border-gray-200">

            {{-- SECTION 5 : Sécurité et Vos droits --}}
            <section>
                <h2 class="text-xl font-semibold text-blue-600 border-b border-blue-100 pb-2 mb-4">Sécurité des données</h2>
                <p class="text-sm leading-relaxed">
                    Nous mettons en œuvre des mesures de sécurité techniques et organisationnelles appropriées pour protéger vos données contre l'accès, la divulgation, la modification ou la destruction non autorisés.
                </p>

                <h2 class="text-xl font-semibold text-blue-600 border-b border-blue-100 pb-2 mb-4 mt-8">Vos droits</h2>
                <h3 class="font-medium text-gray-800 mt-6 mb-2">Droits d'accès et de rectification</h3>
                <p class="text-sm leading-relaxed">
                    Vous avez le droit d'accéder aux données vous concernant et de demander leur rectification si elles sont inexactes ou incomplètes.
                </p>
                
                <h3 class="font-medium text-gray-800 mt-6 mb-2">Autres droits</h3>
                <ul class="list-disc list-inside text-sm space-y-1 ml-4">
                    <li>Droit à l'effacement ("droit à l'oubli").</li>
                    <li>Droit à la limitation du traitement.</li>
                    <li>Droit à la portabilité des données.</li>
                </ul>
            </section>
            
            <hr class="border-gray-200">

            {{-- SECTION 6 : Conservation et Contact --}}
            <section>
                <h2 class="text-xl font-semibold text-blue-600 border-b border-blue-100 pb-2 mb-4">Conservation des données</h2>
                <p class="text-sm leading-relaxed">
                    Vos données sont conservées aussi longtemps que nécessaire pour atteindre les finalités pour lesquelles elles ont été collectées, ou pour respecter les obligations légales (typiquement 5 ans après la fin de la relation commerciale).
                </p>

                <h2 class="text-xl font-semibold text-blue-600 border-b border-blue-100 pb-2 mb-4 mt-8">Contact et exercice de vos droits</h2>
                <h3 class="font-medium text-gray-800 mt-6 mb-2">Coordonnées</h3>
                <p class="text-sm leading-relaxed">
                    Pour toute question relative à cette politique ou pour exercer vos droits, vous pouvez nous contacter à : contact@serviceslocaux.fr
                </p>
            </section>
        </div>

    </div>
</div>

@endsection