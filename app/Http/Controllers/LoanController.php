<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Livro;
use App\Models\Loan;
use Illuminate\Http\Request;
use App\Models\User;

// Define o controller responsável pelas operações de empréstimo e devolução de livros
class LoanController extends Controller
{
    // Método responsável por registrar um novo empréstimo de livro
    public function loanBook(Request $request)
    {
        // Busca o livro pelo ID enviado na requisição.
        // Se não for encontrado, lança uma exceção (404).
        $livro = Livro::findOrFail($request->livro_id);

        // Inicializa a contagem de empréstimos atrasados
        $overdueLoansCount = 0;

        // Inicializa como uma coleção vazia
        $adminOverdueUsers = collect();

        // Verifica se o livro está fora de estoque (quantidade menor que 1)
        if ($livro->qtde < 1) {
            // Retorna um erro em formato JSON com status 400 (bad request)
            return redirect()->back()->with('error', 'Livro fora de estoque.');
        }

        // Força a data atual, mesmo que o frontend envie outro valor
        $request->merge(['loan_date' => now()]);

        // Cria um novo registro de empréstimo na tabela 'loans'
        Loan::create([
            'user_id' => Auth::id(),    // ID do usuário que está pegando o livro emprestado
            'livro_id' => $request->livro_id,    // ID do livro emprestado
            'loan_date' => now(),              // Data e hora atual como data do empréstimo
        ]);

        // Decrementa a quantidade de livros disponíveis em 1
        $livro->decrement('qtde');

        // Retorna resposta de sucesso em formato JSON
        return redirect()->back()->with('success', 'Empréstimo registrado com sucesso.');
    }

    // Método responsável por registrar a devolução de um livro
    public function returnBook($id)
    {
        // Busca o empréstimo pelo ID; se não encontrar, retorna erro 404
        $loan = Loan::findOrFail($id);

        // Verifica se o livro já foi devolvido (campo return_date preenchido)
        if ($loan->return_date) {
            return redirect()->back()->with('error', 'Livro já foi devolvido.');
        }

        // Atualiza a data de devolução com a data e hora atual
        $loan->update(['return_date' => now()]);

        // Aumenta a quantidade do livro em 1, já que foi devolvido
        $loan->livro->increment('qtde');

        // Retorna resposta de sucesso em formato JSON
        return redirect()->back()->with('success', 'Livro devolvido com sucesso.');
    }

    public function listarEmprestimos(Request $request)
    {
        $user = Auth::user();
        $search = $request->input('search');
        $status = $request->input('status');

        $query = Loan::with('livro', 'user')->whereNull('return_date');

        // Restringe para usuários comuns (não-admin)
        if (!$user->is_admin) {
            $query->where('user_id', $user->id);
        }

        if ($status) {
            if ($status == 'atrasados') {
                $query->where('loan_date', '<', now()->subDays(7))->whereNull('return_date');
            } elseif ($status == 'devolvidos') {
                $query->whereNotNull('return_date');
            } elseif ($status == 'pendentes') {
                $query->whereNull('return_date')->where('loan_date', '>=', now()->subDays(7));
            }
        }

        if ($search) {
            // Aplica filtros nos atributos do livro
            $query->where(function ($q) use ($search, $user) {
                $q->whereHas('livro', function ($subQ) use ($search) {
                    $subQ->where('titulo', 'like', "%{$search}%")
                        ->orWhere('autor', 'like', "%{$search}%")
                        ->orWhere('editora', 'like', "%{$search}%")
                        ->orWhere('genero', 'like', "%{$search}%")
                        ->orWhere('edicao', 'like', "%{$search}%")
                        ->orWhere('num_paginas', 'like', "%{$search}%")
                        ->orWhere('isbn', 'like', "%{$search}%")
                        ->orWhere('data', 'like', "%{$search}%")
                        ->orWhere('descricao', 'like', "%{$search}%")
                        ->orWhere('imagem', 'like', "%{$search}%");
                });

                // Admin também pode buscar pelo nome do usuário
                if ($user->is_admin) {
                    $q->orWhereHas('user', function ($subQ) use ($search) {
                        $subQ->where('name', 'like', "%{$search}%");
                    });
                }

                // Filtro por status textual (pendente, atrasado, devolvido)
                if (str_contains(strtolower($search), 'pendente')) {
                    $q->whereRaw('DATEDIFF(NOW(), loan_date) <= 7')->whereNull('return_date');
                } elseif (str_contains(strtolower($search), 'atrasado')) {
                    $q->whereRaw('DATEDIFF(NOW(), loan_date) > 7')->whereNull('return_date');
                } elseif (str_contains(strtolower($search), 'devolvido')) {
                    $q->whereNotNull('return_date');
                }
            });
        }

        $emprestimos = $query->get();

        // Lógica para verificar empréstimos atrasados
        $overdueLoansCount = $user->loans()->whereNull('return_date')->where('loan_date', '<', now()->subDays(7))->count();

        $adminOverdueUsers = collect();
        // Se o usuário for admin, busca todos os usuários com empréstimos atrasados
        if ($user->is_admin) {
            $adminOverdueUsers = User::whereHas('loans', function ($query) {
                $query->whereNull('return_date')->where('loan_date', '<', now()->subDays(7));
            })->get();
        } else {
            $overdueLoansCount = $user->loans()->whereNull('return_date')->where('loan_date', '<', now()->subDays(7))->count();
        }

        return view('emprestimos.index', compact('emprestimos', 'overdueLoansCount', 'adminOverdueUsers'));
    }
}
