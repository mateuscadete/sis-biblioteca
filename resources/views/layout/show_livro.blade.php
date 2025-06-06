{{-- resources/views/layout/show.blade.php --}}
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Lista de Livros</title>
    <link rel="icon" href="{{ asset('imagens/logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/acervo.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
@include('includes.navbar')
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
                    <th>Capa</th>
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
                    <td>
                        @if ($livro->imagem)
                        <img src="{{ asset('storage/' . $livro->imagem) }}" alt="Imagem do livro" style="max-width: 80px;">
                        @else
                        <span>Sem imagem</span>
                        @endif
                    </td>
                    <td>{{ $livro->titulo }}</td>
                    <td>{{ $livro->autor }}</td>
                    <td>{{ $livro->editora }}</td>
                    <td>{{ $livro->genero }}</td>
                    <td>{{ $livro->edicao }}</td>
                    <td>{{ $livro->num_paginas }}</td>
                    <td>{{ $livro->isbn }}</td>
                    <td>{{ Carbon\Carbon::parse($livro->data)->format('d/m/Y') }}</td>
                    <td>{{ $livro->descricao }}</td>
                    <td>
                        <form action="{{ route('livros.destroy', $livro->id) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja apagar este livro?')">Excluir</button>
                        </form>
                        <a href="{{ route('layout.edit', $livro->id) }}" class="btn btn-primary btn-sm mt-1">Editar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>