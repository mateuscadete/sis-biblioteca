<?php

namespace App\Http\Controllers;

use App\Models\Livro; // Certifique-se de que você tem um modelo Livro
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LivroController extends Controller
{
    public function submit(Request $request)
    {
        // Regras de validação
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'genero' => 'required|string|max:255',
            'editora' => 'required|string|max:255',
            'tema' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'edicao' => 'required|string|max:255',
            'imagem' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'num_paginas' => 'required|integer',
            'isbn' => 'required|string|max:255',
            'qtde' => 'required|integer',
            'data' => 'required|date',  // Validação de data
            'descricao' => 'required|string|max:1000',

        ]);

        // Armazenar a imagem no storage/app/public/livros
        $caminhoImagem = $request->file('imagem')->store('livros', 'public');



        // Criar o livro no banco de dados usando o modelo Livro
        Livro::create([
            'titulo' => $request->titulo,
            'genero' => $request->genero,
            'editora' => $request->editora,
            'tema' => $request->tema,
            'autor' => $request->autor,
            'edicao' => $request->edicao,
            'imagem' => $caminhoImagem,
            'num_paginas' => $request->num_paginas,
            'isbn' => $request->isbn,
            'data' => $request->data,
            'descricao' => $request->descricao,
            'qtde' => $request->qtde,

        ]);

        // Redirecionar com uma mensagem de sucesso
        return redirect()->route('layout.show')->with('success', 'Livro cadastrado com sucesso!');
    }
    public function index()
    {    if (!auth()->check() || !auth()->user()->is_admin) {
        return redirect()->route('/user.index')->with('error', 'Você não tem permissão para acessar essa página.');
    }
        return view("dashboard");
    }

    public function destroy(Livro $livro)
    {
        // Apagar o registro no BD
        $livro->delete();

        // Redirecionar o usuário, enviar a mensagem de sucesso
        return redirect()->route('layout.show')->with('success', 'Livro apagado com sucesso!');
    }
    public function show()
    {
        $livros = Livro::all(); // busca todos os livros
        return view('layout.show_livro', compact('livros')); // passa para a view
    }
    public function edit(Livro $livro)
    {
        return view('layout.edit', compact('livro'));
    }

    public function update(Request $request, Livro $livro)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'genero' => 'required|string|max:255',
            'editora' => 'required|string|max:255',
            'tema' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'edicao' => 'required|string|max:255',
            'num_paginas' => 'required|integer',
            'isbn' => 'required|string|max:255',
            'qtde' => 'required|integer',
            'data' => 'required|date',
            'descricao' => 'required|string|max:1000',
            'imagem' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // imagem opcional na edição
        ]);
    
        // Se enviou uma imagem nova, processa ela
        if ($request->hasFile('imagem')) {
            // Apaga a imagem antiga se existir
            if ($livro->imagem) {
                Storage::delete('public/' . $livro->imagem);
            }
            // Armazena a nova imagem
            $validated['imagem'] = $request->file('imagem')->store('livros', 'public');
        } else {
            // Mantém a imagem antiga (não altera no banco)
            $validated['imagem'] = $livro->imagem;
        }
    
        // Atualiza o livro com todos os dados (inclusive imagem atualizada ou mantida)
        $livro->update($validated);
    
        return redirect()->route('layout.show')->with('success', 'Livro atualizado com sucesso!');
    }
    /**
     * Filtra os livros com base no termo de busca fornecido.
     *
     * Aceita um termo de busca via requisição e retorna os livros cujo título,
     * autor ou ano da data correspondam ao termo informado.
     *
     * @param  \Illuminate\Http\Request  $request  Requisição contendo o termo de busca.
     * @return \Illuminate\View\View  Retorna a view com a lista de livros filtrados.
     */
    public function filtro(Request $request)
    {
        $busca = $request->input('busca');

        $livros = Livro::query()
            ->when($busca, function ($query, $busca) {
                $query->where(function ($q) use ($busca) {
                    $q->where('titulo', 'like', "%{$busca}%")
                        ->orWhere('autor', 'like', "%{$busca}%")
                        ->orWhere('editora', 'like', "%{$busca}%")
                        ->orWhere('genero', 'like', "%{$busca}%")
                        ->orWhere('edicao', 'like', "%{$busca}%")
                        ->orWhere('num_paginas', 'like', "%{$busca}%")
                        ->orWhere('isbn', 'like', "%{$busca}%")
                        ->orWhere('descricao', 'like', "%{$busca}%")
                        ->orWhereDate('data', 'like', "%{$busca}%");
                });
            })
            ->get();

        return view('layout.acervo', compact('livros'));
    }
    
    
}
