<?php

namespace App\Http\Controllers;

use App\Models\Livro; // Certifique-se de que você tem um modelo Livro
use Illuminate\Http\Request;

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
            'num_paginas' => 'required|integer',  
            'isbn' => 'required|string|max:255',
            'data' => 'required|date',  // Validação de data
            'id' => 'required|unique:livros,id|string|max:255',  // Exemplo para garantir que o ID seja único
        ]);

        // Criar o livro no banco de dados usando o modelo Livro
        Livro::create([
            'titulo' => $request->titulo,
            'genero' => $request->genero,
            'editora' => $request->editora,
            'tema' => $request->tema,
            'autor' => $request->autor,
            'edicao' => $request->edicao,
            'num_paginas' => $request->num_paginas,
            'isbn' => $request->isbn,
            'data' => $request->data,
            'id' => $request->id,
        ]);

        // Redirecionar com uma mensagem de sucesso
        return redirect()->route('user.index')->with('success', 'Livro cadastrado com sucesso!');
    }
}
