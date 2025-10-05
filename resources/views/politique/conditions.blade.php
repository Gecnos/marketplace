@extends('layouts.app')

@section('content')

<div class="bg-white min-h-screen">
    <div class="max-w-4xl mx-auto py-12 px-4 sm:px-6 lg:px-8">

        {{-- En-tête de la Page --}}
        <header class="text-center mb-10">
            <h1 class="text-3xl font-extrabold text-gray-900 mb-2">Conditions Générales d'Utilisation</h1>
            <p class="text-sm text-gray-500">
                Version à jour au 1er Janvier 2025
            </p>
        </header>

        {{-- Contenu des CGU --}}
        <div class="space-y-10 text-gray-700">

            {{-- 1. Objet de la plateforme --}}
            <section>
                <h2 class="text-lg font-bold text-gray-900 mb-2">1. Objet de la plateforme</h2>
                <p class="text-sm leading-relaxed">
                    1.1. ServicesLocaux est une plateforme de mise en relation entre des prestataires de services locaux et des clients. La plateforme a pour unique objet de faciliter la découverte et le contact entre les parties.
                </p>
                <p class="text-sm leading-relaxed mt-2">
                    1.2. ServicesLocaux agit uniquement comme un intermédiaire et n'intervient pas dans les transactions commerciales entre les utilisateurs et les prestataires.
                </p>
            </section>

            <hr class="border-gray-200">

            {{-- 2. Utilisation de la plateforme --}}
            <section>
                <h2 class="text-lg font-bold text-gray-900 mb-2">2. Utilisation de la plateforme</h2>
                
                <h3 class="font-semibold text-gray-800 mt-4 mb-1">2.1 Accès libre</h3>
                <p class="text-sm leading-relaxed">
                    L'accès à la consultation des profils de prestataires est libre et gratuit pour tous les utilisateurs.
                </p>

                <h3 class="font-semibold text-gray-800 mt-4 mb-1">2.2 Inscription</h3>
                <p class="text-sm leading-relaxed">
                    L'inscription est optionnelle pour contacter les prestataires, mais obligatoire pour laisser des avis ou sauvegarder des favoris.
                </p>

                <h3 class="font-semibold text-gray-800 mt-4 mb-1">2.3 Utilisation responsable</h3>
                <p class="text-sm leading-relaxed">
                    Les utilisateurs s'engagent à utiliser la plateforme de manière responsable et à ne pas publier de contenu inapproprié, diffamatoire ou frauduleux.
                </p>
            </section>

            <hr class="border-gray-200">

            {{-- 3. Prestataires --}}
            <section>
                <h2 class="text-lg font-bold text-gray-900 mb-2">3. Prestataires</h2>
                
                <h3 class="font-semibold text-gray-800 mt-4 mb-1">3.1 Inscription des prestataires</h3>
                <p class="text-sm leading-relaxed">
                    Les prestataires peuvent s'inscrire gratuitement sur la plateforme en fournissant des informations exactes et à jour sur leur activité.
                </p>

                <h3 class="font-semibold text-gray-800 mt-4 mb-1">3.2 Responsabilité</h3>
                <p class="text-sm leading-relaxed">
                    Les prestataires sont seuls responsables des informations qu'ils publient (services, prix, disponibilités) et de la qualité du service qu'ils proposent.
                </p>

                <h3 class="font-semibold text-gray-800 mt-4 mb-1">3.3 Prix facturés</h3>
                <p class="text-sm leading-relaxed">
                    Les prix affichés sur la plateforme sont purement indicatifs et pourront être modifiés par le prestataire après un devis.
                </p>
            </section>

            <hr class="border-gray-200">

            {{-- 4. Avis et évaluations --}}
            <section>
                <h2 class="text-lg font-bold text-gray-900 mb-2">4. Avis et évaluations</h2>
                <p class="text-sm leading-relaxed">
                    Les utilisateurs peuvent laisser des avis sur les prestataires après avoir utilisé leurs services. Ces avis doivent être sincères et basés sur une expérience réelle.
                </p>
                <p class="text-sm leading-relaxed mt-2">
                    ServicesLocaux se réserve le droit de modérer et supprimer tout avis jugé inapproprié, faux ou non conforme à nos standards.
                </p>
            </section>

            <hr class="border-gray-200">

            {{-- 5. Limitation de responsabilité --}}
            <section>
                <h2 class="text-lg font-bold text-gray-900 mb-2">5. Limitation de responsabilité</h2>
                
                <h3 class="font-semibold text-gray-800 mt-4 mb-1">5.1 Rôle de la plateforme</h3>
                <p class="text-sm leading-relaxed">
                    ServicesLocaux agit uniquement comme intermédiaire pour la mise en relation. Nous ne sommes pas partie prenante aux contrats passés entre utilisateurs et prestataires.
                </p>

                <h3 class="font-semibold text-gray-800 mt-4 mb-1">5.2 Aucune garantie</h3>
                <p class="text-sm leading-relaxed">
                    La plateforme ne garantit pas :
                </p>
                <ul class="list-disc list-inside text-sm space-y-1 ml-4">
                    <li>La disponibilité des services proposés par les prestataires.</li>
                    <li>L'exactitude des informations publiées.</li>
                    <li>La qualité des travaux réalisés.</li>
                    <li>Le respect des prix indiqués.</li>
                </ul>

                <h3 class="font-semibold text-gray-800 mt-4 mb-1">5.3 Exclusion de responsabilité</h3>
                <p class="text-sm leading-relaxed">
                    ServicesLocaux décline toute responsabilité en cas de :
                </p>
                <ul class="list-disc list-inside text-sm space-y-1 ml-4">
                    <li>Litige entre utilisateur et prestataire.</li>
                    <li>Dommage résultant des services du prestataire.</li>
                    <li>Arnaque ou fraude commise par un prestataire.</li>
                    <li>Non-respect des engagements pris par un prestataire.</li>
                </ul>
            </section>

            <hr class="border-gray-200">

            {{-- 6. Signalements --}}
            <section>
                <h2 class="text-lg font-bold text-gray-900 mb-2">6. Signalements</h2>
                <p class="text-sm leading-relaxed">
                    Un formulaire de signalement est mis à disposition des utilisateurs pour reporter tout comportement inapproprié ou frauduleux.
                </p>
                <p class="text-sm leading-relaxed mt-2">
                    ServicesLocaux traitera les signalements et prendra les mesures appropriées, pouvant aller jusqu'à la suppression du compte du prestataire concerné.
                </p>
            </section>

            <hr class="border-gray-200">

            {{-- 7. Données personnelles --}}
            <section>
                <h2 class="text-lg font-bold text-gray-900 mb-2">7. Données personnelles</h2>
                <p class="text-sm leading-relaxed">
                    Le traitement des données personnelles est régi par notre Politique de Confidentialité, disponible séparément.
                </p>
                <p class="text-sm leading-relaxed mt-2">
                    Les utilisateurs disposent d'un droit d'accès, de rectification et de suppression de leurs données personnelles.
                </p>
            </section>

            <hr class="border-gray-200">

            {{-- 8. Modifications des CGU --}}
            <section>
                <h2 class="text-lg font-bold text-gray-900 mb-2">8. Modifications des CGU</h2>
                <p class="text-sm leading-relaxed">
                    ServicesLocaux se réserve le droit de modifier ces conditions générales à tout moment. Les utilisateurs seront informés des modifications par notification sur la plateforme.
                </p>
                <p class="text-sm leading-relaxed mt-2">
                    La poursuite de l'utilisation de la plateforme après modification vaut acceptation des nouvelles conditions.
                </p>
            </section>

            <hr class="border-gray-200">

            {{-- 9. Contact --}}
            <section>
                <h2 class="text-lg font-bold text-gray-900 mb-2">9. Contact</h2>
                <p class="text-sm leading-relaxed">
                    Pour toute question concernant ces conditions générales, vous pouvez nous contacter via notre page de contact ou à l'adresse : <a href="mailto:legal@serviceslocaux.com" class="text-blue-600 hover:underline">legal@serviceslocaux.com</a>.
                </p>
            </section>
        </div>
    </div>
</div>

@endsection