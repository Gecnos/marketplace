<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the categories.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $categories = Category::withCount('prestataires')->get();

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
    /**
     * Display the specified category.
     *
     * @param  string  $slug
     * @return \Illuminate\View\View
     */
    public function show($slug)
    {
        // Find the category by its slug and load its prestataires
        $category = Category::where('slug', $slug)->with('prestataires')->firstOrFail();

        // Return the view with the category and its prestataires
        return view('categories.show', [
            'category' => $category,
        ]);
    }
}
