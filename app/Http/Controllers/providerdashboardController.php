<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Assurez-vous que le modèle User est importé
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class providerdashboardController extends Controller
{
    public function index()
    {
        /** @var User $user */
        $user = Auth::user()->load(['reviews', 'media', 'category']);

        // ... (le reste de la logique de l'index reste la même)
        $reviews = $user->reviews;
        $reviews_count = $reviews->count();
        $average_rating = $reviews_count > 0 ? $reviews->avg('rating') : 0;

        $completionTasks = [
            'Remplir la description' => ['done' => !empty($user->description), 'points' => 10],
            'Ajouter un numéro de téléphone' => ['done' => !empty($user->telephone), 'points' => 10],
            'Confirmer l\'adresse' => ['done' => !empty($user->ville), 'points' => 10],
            'Ajouter au moins une photo' => ['done' => $user->media->where('collection_name', 'gallery')->isNotEmpty(), 'points' => 15],
        ];
        $completionScore = collect($completionTasks)->filter(fn($task) => $task['done'])->sum('points');
        $formattedTasks = array_map(function($label, $task) {
            return ['label' => $label, 'done' => $task['done'], 'points' => $task['points']];
        }, array_keys($completionTasks), array_values($completionTasks));

        $gallery = $user->media->where('collection_name', 'gallery')->map(function ($mediaItem) {
            return [
                'id' => $mediaItem->id,
                'url' => $mediaItem->url,
                'alt' => $mediaItem->file_name,
            ];
        })->values()->all();

        $formattedReviews = $reviews->load('author')->map(function ($review) {
            return [
                'author' => $review->author->name ?? 'Utilisateur supprimé',
                'service' => $review->service ?? 'Service non spécifié',
                'date' => $review->created_at->format('d M Y'),
                'rating' => $review->rating,
                'content' => $review->content,
                'helpful' => 0,
                'is_verified' => true,
            ];
        })->all();

        // Données simulées pour les graphiques
        $months = ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin'];
        $viewsHistory = [rand(100, 300), rand(200, 400), rand(300, 500), rand(250, 450), rand(350, 550), rand(400, 600)];
        $contactsHistory = [rand(10, 30), rand(20, 40), rand(30, 50), rand(25, 45), rand(35, 55), rand(40, 60)];

        // 5. Construction du tableau de données pour la vue
        $providerData = [
            'id' => $user->id,
            'name' => $user->entreprise ?? $user->name,
            'category' => $user->category->name ?? 'Non défini',
            'location' => $user->ville,
            'rating' => round($average_rating, 1),
            'reviews_count' => $reviews_count,
            'is_verified' => optional($user->verification)->status === 'approved',
            'is_premium' => optional($user->subscription)->expires_at > now(),
            'description' => $user->description ?? 'Aucune description fournie.',
            'phone' => $user->telephone,
            'email' => $user->email,
            'stats' => [
                'views_month' => $viewsHistory[array_key_last($viewsHistory)],
                'views_change' => '+12%',
                'contacts_month' => $contactsHistory[array_key_last($contactsHistory)],
                'contacts_change' => '+8%',
                'conversion_rate' => '6.5%',
                'response_time' => '2h',
            ],
            'profile_completion' => [
                'score' => $completionScore,
                'tasks' => $formattedTasks,
            ],
            'gallery' => $gallery,
            'reviews' => $formattedReviews,
            'chart_data' => [
                'labels' => $months,
                'views' => $viewsHistory,
                'contacts' => $contactsHistory,
            ],
        ];

        return view('provider.dashboard', ['provider' => $providerData, 'user' => $user]);
    }

    public function update(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();

        $validatedData = $request->validate([
            'entreprise' => 'nullable|string|max:255',
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'telephone' => 'required|string|max:20',
            'ville' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $user->update($validatedData);

        return redirect()->route('provider.dashboard')->with('success', 'Vos informations ont été mises à jour avec succès.');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        /** @var User $user */
        $user = Auth::user();
        $file = $request->file('photo');

        $path = $file->store('gallery/' . $user->id, 'public');

        $user->media()->create([
            'collection_name' => 'gallery',
            'file_name' => $file->getClientOriginalName(),
            'mime_type' => $file->getMimeType(),
            'path' => $path,
            'disk' => 'public',
            'size' => $file->getSize(),
            'url' => Storage::url($path),
        ]);

        return back()->with('success', 'Photo ajoutée avec succès.');
    }
}