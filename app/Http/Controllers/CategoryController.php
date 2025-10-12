<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display the specified category.
     *
     * @param  string  $slug
     * @return \Illuminate\View\View
     */
    public function show($slug)
    {
        // Find the category by its slug
        $category = Category::where('slug', $slug)->firstOrFail();

        // Return the view with the category data
        return view('categories.show', [
            'category' => $category,
        ]);
    }
}
