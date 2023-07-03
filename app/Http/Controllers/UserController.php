<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    // El método index generalmente se utiliza para devolver todos los elementos de un recurso.
    public function index() {
        $users = User::all();
        
        return view('users', ['users' => $users]);
     }
}
