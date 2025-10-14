<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function index()
    {
        $categories = Category::all();

        foreach ($categories as $category) {
            $category->prestataires_count = User::where('categorie_id', $category->id)->where(DB::raw('LOWER(role)'), 'provider')->count();
        }

        // The prestataires query is kept disabled to avoid errors.
        $prestatairesRecommandes = [];

        return view('welcome', [
            'categories' => $categories,
            'prestatairesRecommandes' => $prestatairesRecommandes,
        ]);
    }

    /**
     * Display the search results page.
     */
    public function search(Request $request)
    {
        $query = $request->input('query');

        if (empty($query)) {
            return redirect()->route('welcome');
        }

        $results = User::where('role', 'provider')
            ->where(function ($q) use ($query) {
                $q->where('name', 'like', "%{$query}%")
                  ->orWhere('surname', 'like', "%{$query}%")
                  ->orWhere('entreprise', 'like', "%{$query}%");
            })
            ->orWhereHas('category', function ($q) use ($query) {
                $q->where('name', 'like', "%{$query}%");
            })
            ->get();

        return view('search.results', [
            'query' => $query,
            'results' => $results,
        ]);
    }
}
