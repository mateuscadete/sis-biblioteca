<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LinkController extends Controller
{
    
    // Redireciona para uma rota interna
    public function redirectToHome()
    {
        return redirect()->route('home');
    }

    // Exibe uma página com links
    public function showLinks()
    {
        return view('..\..\resources\views\welcome.blade.php');
    }
}
