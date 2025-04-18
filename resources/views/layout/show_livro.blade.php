{{-- resources/views/layout/show.blade.php --}}
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Livros</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
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
</body>
</html>
