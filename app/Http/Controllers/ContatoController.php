<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mail\ContatoAdmin;

use Illuminate\Support\Facades\Mail;

// Define a classe ContatoController, que herda a base Controller do Laravel
class ContatoController extends Controller
{
    // Método que retorna a view do formulário de contato
    public function index()
    {
        return view('layout.contato'); // Exibe a página "contato" localizada em resources/views/layout/contato.blade.php
    }
}

