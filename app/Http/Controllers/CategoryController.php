<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\User;

class CategoryController extends Controller
{
    /**
     * Display a listing of the categories.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $categories = Category::all();

        foreach ($categories as $category) {
            $category->prestataires_count = User::where('categorie_id', $category->id)->where(DB::raw('LOWER(role)'), 'provider')->count();
        }

        return view('categories.index', [
            'categories' => $categories,
        ]);
    }

    /**
     * Display the specified category.
     *
     * @param  string  $slug
     * @return \Illuminate\View\View
     */
    public function show($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $prestataires = $category->users()->where('role', 'provider')->get();

        return view('categories.show', [
            'category' => $category,
            'prestataires' => $prestataires,
        ]);
    }
}
