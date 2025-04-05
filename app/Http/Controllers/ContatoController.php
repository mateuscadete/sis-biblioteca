<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContatoAdmin;
use Illuminate\Support\Facades\Mail;

class ContatoController extends Controller
{
    public function submit(Request $request)
    {
        $dados = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email',
            'assunto' => 'required|string|max:1000',
        ]);

        // E-mail do administrador
        $adminEmail = 'admin@bibliotecaeteczl.com'; // Altere conforme necessário

        // Envia o e-mail
        Mail::to($adminEmail)->send(new ContatoAdmin($dados));

        return back()->with('success', 'Mensagem enviada com sucesso!');
    }

    public function index()
    {
        return view('layout.contato');
    }
}
