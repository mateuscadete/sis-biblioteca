<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use App\Models\Loan;
use Illuminate\Http\Request;

// Define o controller responsável pelas operações de empréstimo e devolução de livros
class LoanController extends Controller
{
    // Método responsável por registrar um novo empréstimo de livro
    public function loanBook(Request $request)
    {
        // Busca o livro pelo ID enviado na requisição.
        // Se não for encontrado, lança uma exceção (404).
        $book = Livro::findOrFail($request->book_id);

        // Verifica se o livro está fora de estoque (quantidade menor que 1)
        if ($book->quantity < 1) {
            // Retorna um erro em formato JSON com status 400 (bad request)
            return response()->json(['error' => 'Livro fora de estoque.'], 400);
        }

        // Cria um novo registro de empréstimo na tabela 'loans'
        Loan::create([
            'user_id' => $request->user_id,    // ID do usuário que está pegando o livro emprestado
            'book_id' => $request->book_id,    // ID do livro emprestado
            'loan_date' => now(),              // Data e hora atual como data do empréstimo
        ]);

        // Decrementa a quantidade de livros disponíveis em 1
        $book->decrement('quantity');

        // Retorna resposta de sucesso em formato JSON
        return response()->json(['message' => 'Empréstimo registrado com sucesso.']);
    }

    // Método responsável por registrar a devolução de um livro
    public function returnBook($id)
    {
        // Busca o empréstimo pelo ID; se não encontrar, retorna erro 404
        $loan = Loan::findOrFail($id);

        // Verifica se o livro já foi devolvido (campo return_date preenchido)
        if ($loan->return_date) {
            return response()->json(['error' => 'Livro já foi devolvido.'], 400);
        }

        // Atualiza a data de devolução com a data e hora atual
        $loan->update(['return_date' => now()]);

        // Aumenta a quantidade do livro em 1, já que foi devolvido
        $loan->livro->increment('quantity');

        // Retorna resposta de sucesso em formato JSON
        return response()->json(['message' => 'Livro devolvido com sucesso.']);
    }
}


