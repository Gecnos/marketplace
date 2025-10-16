<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('medias', function (Blueprint $table) {
            $table->id();

            // Clés étrangères génériques (Polymorphic Relation)
            // Permet d'attacher un média à n'importe quel modèle (User, Category, Product, etc.)
            $table->unsignedBigInteger('mediable_id');
            $table->string('mediable_type');
            $table->index(['mediable_id', 'mediable_type']);

            // Type de média (Ex: 'avatar', 'gallery', 'logo', 'proof')
            // Utile pour savoir à quoi sert ce média sur le modèle parent.
            $table->string('collection_name')->default('default');

            // Colonnes du Fichier
            $table->string('file_name');      // Nom original du fichier
            $table->string('disk')->default('public'); // Le système de fichiers utilisé (local, s3, etc.)
            $table->string('mime_type')->nullable(); // Ex: image/jpeg
            $table->string('path');           // Chemin relatif ou URL du fichier
            $table->string('url');            // URL complète pour l'affichage (si différente de 'path')
            $table->unsignedBigInteger('size'); // Taille du fichier en bytes

            // Métadonnées
            $table->integer('order_column')->nullable(); // Pour l'ordre d'affichage dans une galerie

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medias');
    }
};
