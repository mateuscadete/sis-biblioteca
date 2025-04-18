<?php

namespace App\Http\Controllers;
use App\Models\Livro;
use App\Models\Loan;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function loanBook(Request $request)
    {
        $book = Livro::findOrFail($request->book_id);

        if ($book->quantity < 1) {
            return response()->json(['error' => 'Livro fora de estoque.'], 400);
        }

        Loan::create([
            'user_id' => $request->user_id,
            'book_id' => $request->book_id,
            'loan_date' => now(),
        ]);

        $book->decrement('quantity');

        return response()->json(['message' => 'Empréstimo registrado com sucesso.']);
    }

    public function returnBook($id)
    {
        $loan = Loan::findOrFail($id);

        if ($loan->return_date) {
            return response()->json(['error' => 'Livro já foi devolvido.'], 400);
        }

        $loan->update(['return_date' => now()]);
        $loan->book->increment('quantity');

        return response()->json(['message' => 'Livro devolvido com sucesso.']);
    }
}

