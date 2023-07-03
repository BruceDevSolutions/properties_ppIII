<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    public function show ($tag) {
        // Todas las propiedades que pertenecen a determinada etiqueta
        $properties = Tag::find($tag)->properties()->paginate(6);

        $categories = Category::all();

        // El objeto de la etiqueta
        $tag = Tag::find($tag);


        return view('tags.show', compact('properties', 'tag', 'categories'));
    }
}
