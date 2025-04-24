<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Define a classe Loan, que representa a tabela de empréstimos no banco de dados
class Loan extends Model
{
    // Usa o trait HasFactory, útil para gerar dados de teste com o model
    use HasFactory;

    // Define os campos que podem ser preenchidos em massa (mass assignment)
    // Isso evita vulnerabilidades e permite criar ou atualizar registros com segurança
    protected $fillable = [
        'user_id',
        'livro_id',
        'loan_date',
        'return_date',
    ];

    // Define o relacionamento entre empréstimo e usuário
    // Um empréstimo pertence a um usuário
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define o relacionamento entre empréstimo e livro
    // Um empréstimo pertence a um livro
    public function livro()
    {
        return $this->belongsTo(Livro::class, 'livro_id');
    }

}

