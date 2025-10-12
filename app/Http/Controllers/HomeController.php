<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;

class HomeController extends Controller
{

    public function index()
    {
        // Fetching only the categories, without counting providers, to avoid the 'users' table error.
        $categories = Category::select('id', 'name')
            ->get()
            ->map(function ($category) {
                return (object) [
                    'name' => $category->name,
                    'slug' => str()->slug($category->name),
                    'count' => 0, // Mocking the count to 0
                ];
            });

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
        // This is a placeholder for the search functionality.
        // It currently just returns the search results view.
        return view('search.results');
    }
}
