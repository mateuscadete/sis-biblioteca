<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
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
        $livro = Livro::findOrFail($request->livro_id);

        // Verifica se o livro está fora de estoque (quantidade menor que 1)
        if ($livro->qtde < 1) {
            // Retorna um erro em formato JSON com status 400 (bad request)
            return redirect()->back()->with('error', 'Livro fora de estoque.');
        }

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
            return response()->json(['error' => 'Livro já foi devolvido.'], 400);
        }

        // Atualiza a data de devolução com a data e hora atual
        $loan->update(['return_date' => now()]);

        // Aumenta a quantidade do livro em 1, já que foi devolvido
        $loan->livro->increment('qtde');

        // Retorna resposta de sucesso em formato JSON
        return response()->json(['message' => 'Livro devolvido com sucesso.']);
    }

    public function listarEmprestimos()
    {
        // Obtém o usuário atualmente autenticado
        $user = Auth::user();

        if ($user->is_admin) {
            // Se o usuário for um administrador,
            // ele pode ver todos os empréstimos que ainda não foram devolvidos (return_date é nulo)
            // Também carrega os relacionamentos com os modelos 'livro' e 'user' para evitar múltiplas consultas ao banco (eager loading)
            $emprestimos = Loan::with('livro', 'user')->whereNull('return_date')->get();
        } else {
            // Se for um usuário comum,
            // ele só pode ver os seus próprios empréstimos que ainda não foram devolvidos
            // Também carrega o relacionamento com o modelo 'livro'
            $emprestimos = Loan::with('livro')
                ->where('user_id', $user->id) // filtra os empréstimos do usuário logado
                ->whereNull('return_date')   // somente empréstimos ainda não devolvidos
                ->get();
        }

        // Retorna a view 'layout.emprestimos' passando a variável $emprestimos para ser usada na visualização
        return view('emprestimos.index', compact('emprestimos'));
    }

}


