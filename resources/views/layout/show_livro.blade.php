<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Livros</title>
    <link rel="icon" href="{{ asset('imagens/logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/listalivros.css') }}">

</head>

<body>
@include('includes.navbar')


    <div class="mensagem">
        @if(session('success'))
        <div class="sucesso">
            {{ session('success') }}
        </div>
        @endif
        </div>
<center>
        <section class="livros">

        <h2>Lista de Livros</h2>
        <h3>Aqui estão os livros cadastrados!</h3>

        <div class="containerbooks">

        <table class="informações">
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
                    <td class="descrição">{{ $livro->descricao }}</td>
                    <td>
                        <form action="{{ route('livros.destroy', $livro->id) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="excluir" onclick="return confirm('Tem certeza que deseja apagar este livro?')">Excluir</button>
                        </form>
                        <a href="{{ route('layout.edit', $livro->id) }}" class="editar">Editar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>

        </section>
</center>
  

    @include('includes.footer')
</body>

</html>