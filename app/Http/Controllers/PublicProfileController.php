<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PublicProfileController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        // Assurez-vous que l'utilisateur est bien un prestataire
        if ($user->role !== 'provider') {
            abort(404);
        }

        // Charger les relations nécessaires
        $user->load('reviews.author', 'media', 'category');

        return view('profile.show', ['provider' => $user]);
    }
}