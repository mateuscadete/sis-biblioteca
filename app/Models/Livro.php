<?php

// Define o namespace onde esse model está localizado.
// Isso ajuda o Laravel a organizar e localizar arquivos.
namespace App\Models;

// Importa o trait HasFactory para permitir o uso de model factories
use Illuminate\Database\Eloquent\Factories\HasFactory;

// Importa a classe base Model do Eloquent ORM, que o Laravel usa para representar tabelas do banco de dados
use Illuminate\Database\Eloquent\Model;

// Define a classe Livro, que representa a tabela "livros" no banco de dados
class Livro extends Model
{
    // Usa o trait HasFactory para permitir criar instâncias do model com dados fictícios (útil para testes e seeders)
    use HasFactory;

    // Define os campos que podem ser preenchidos em massa (mass assignment)
    // Isso é uma medida de segurança para evitar que atributos indesejados sejam atribuídos automaticamente
    protected $fillable = [
        'titulo',       // Título do livro
        'genero',       // Gênero literário (ex: romance, ficção, etc.)
        'editora',      // Nome da editora
        'tema',         // Tema principal da obra
        'autor',        // Nome do autor
        'edicao',       // Número ou descrição da edição
        'num_paginas',  // Quantidade de páginas do livro
        'isbn',         // Código ISBN que identifica o livro internacionalmente
        'data',         // Data de publicação (ou outra data relevante)
        'qtde',         // Quantidade de exemplares disponíveis
        'descricao'     // Descrição ou sinopse do livro
    ];

    // Define o relacionamento entre Livro e Loan (empréstimos)
    // Um livro pode ter vários empréstimos (relacionamento 1:N)
    public function loans()
    {
        // Retorna todos os empréstimos relacionados a este livro
        return $this->hasMany(Loan::class);
    }
}

