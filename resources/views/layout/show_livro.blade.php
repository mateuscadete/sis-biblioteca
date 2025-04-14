
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livros</title>
</head>
<body>
    
@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <h2>Lista de Livros</h2>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Editora</th>
                    <th>Gênero</th>
                    <th>Edição</th>
                    <th>Páginas</th>
                    <th>ISBN</th>
                    <th>Data</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($livros as $livro)
                    <tr>
                        <td>{{ $livro->titulo }}</td>
                        <td>{{ $livro->autor }}</td>
                        <td>{{ $livro->editora }}</td>
                        <td>{{ $livro->genero }}</td>
                        <td>{{ $livro->edicao }}</td>
                        <td>{{ $livro->num_paginas }}</td>
                        <td>{{ $livro->isbn }}</td>
                        <td>{{ \Carbon\Carbon::parse($livro->data)->format('d/m/Y') }}</td>
                        <td>{{ $livro->descricao }}</td>
                        <td>
                            <form action="{{ route('livros.destroy', $livro->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit" onclick="return confirm('Tem certeza que deseja apagar este livro?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

</body>
</html>