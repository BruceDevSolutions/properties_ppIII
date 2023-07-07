<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class PropertyController extends Controller
{
    // Para mostrar todos los recursos
    public function index() {
        $categories = Category::all();

        $properties = Property::where('status', 'visible')->orderBy('id', 'desc')->paginate(6);

        return view('home', compact('properties', 'categories'));
    }

    // Para mostrar un recurso específico.
    public function show($variable) {
        $categories = Category::all();

        $property = Property::find($variable);
        
        return view('show', compact('property', 'categories'));
    }
}
