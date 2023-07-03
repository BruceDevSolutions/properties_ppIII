<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Property;

class CategoryController extends Controller
{
    public function show($category) {
        $categories = Category::all();

        // Ya tiene la categoría
        $category = Category::find($category);

        $properties = Property::where('category_id', $category->id)->paginate(6);
        
        return view('categories.show', compact('category', 'categories', 'properties'));
    }
}
