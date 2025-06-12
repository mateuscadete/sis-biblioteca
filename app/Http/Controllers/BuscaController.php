<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuscaController extends Controller
{
    public function redirecionar(Request $request)
    {
        $termo = strtolower(trim($request->input('termo')));

        // Mapeamento de termos para rotas
        $rotas = [
            'home' => route('user.index'),
            'cadastrar livro' => route('dashboard'),
            'livros' => route('layout.acervo'),
            'show' => route('layout.show'),
            'cadastrar' => route('user.cadastro'),
            'logar' => route('user.login'),
            'sobre' => route('layout.sobre'),
            'emprestimos' => route('emprestimos.index'),
            'contato' => route('contato.index'),
            'ajuda' => route('user.ajuda'),


            // adicione mais termos e rotas conforme seu site
        ];

        // Procura se o termo digitado bate com alguma chave
        foreach ($rotas as $palavraChave => $rota) {
            if (str_contains($termo, $palavraChave)) {
                return redirect($rota);
            }
        }

        // Se não encontrou nenhuma correspondência
        return back()->with('erro', 'Página não encontrada.');
    }
}
