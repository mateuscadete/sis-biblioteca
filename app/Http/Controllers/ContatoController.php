<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mail\ContatoAdmin;

use Illuminate\Support\Facades\Mail;

// Define a classe ContatoController, que herda a base Controller do Laravel
class ContatoController extends Controller
{
    // Método responsável por processar o envio do formulário de contato
    public function submit(Request $request)
    {
        // Valida os dados recebidos da requisição
        // Garante que nome, email e assunto sejam preenchidos corretamente
        $dados = $request->validate([
            'nome' => 'required|string|max:255',      // Nome obrigatório, string, até 255 caracteres
            'email' => 'required|email',              // E-mail obrigatório e válido
            'assunto' => 'required|string|max:1000',  // Assunto obrigatório, até 1000 caracteres
        ]);

        // Define o e-mail do administrador para onde a mensagem será enviada
        $adminEmail = 'admin@bibliotecaeteczl.com'; // Pode ser alterado conforme necessário

        // Envia o e-mail para o administrador com os dados do formulário
        Mail::to($adminEmail)->send(new ContatoAdmin($dados));

        // Redireciona o usuário de volta com uma mensagem de sucesso
        return back()->with('success', 'Mensagem enviada com sucesso!');
    }

    // Método que retorna a view do formulário de contato
    public function index()
    {
        return view('layout.contato'); // Exibe a página "contato" localizada em resources/views/layout/contato.blade.php
    }
}

