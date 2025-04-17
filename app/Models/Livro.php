<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;
    protected $fillable = ['titulo', 'qtde'];

    // Defina os campos que podem ser preenchidos em massa
    protected $fillable = [
        'titulo', 'genero', 'editora', 'tema', 'autor', 'edicao',
        'num_paginas', 'isbn', 'data','descricao',
    ];

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }
}
