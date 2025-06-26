<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('imagens/logo.png') }}" type="image/x-icon">
    <title>Lista de Livros</title>
    <link rel="stylesheet" href="{{ asset('css/listalivros.css') }}">

</head>

<body>
    @include('includes.navbar')

    <main>

        <div class="mensagem">
            @if(session('success'))
            <div class="sucesso">
                {{ session('success') }}
            </div>
            @endif
        </div>

        <section class="livros">

            <h2>Lista de Livros</h2>
            <h3>Aqui estão os livros cadastrados!</h3>

            <div class="containerbooks">

                <table class="informações">
                    <thead>
                        <tr>
                            <th scope="col">Capa</th>
                            <th scope="col">Título</th>
                            <th scope="col">Autor</th>
                            <th scope="col">Editora</th>
                            <th scope="col">Gênero</th>
                            <th scope="col">Edição</th>
                            <th scope="col">Páginas</th>
                            <th scope="col">ISBN</th>
                            <th scope="col">Data</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($livros as $livro)
                        <tr>
                            <td data-label="Capa">
                                @if ($livro->imagem)
                                <img src="{{ asset('storage/' . $livro->imagem) }}" alt="Imagem do livro" style="max-width: 80px;">
                                @else
                                <span>Sem imagem</span>
                                @endif
                            </td>
                            <td data-label="Título">{{ $livro->titulo }}</td>
                            <td data-label="Autor">{{ $livro->autor }}</td>
                            <td data-label="Editora">{{ $livro->editora }}</td>
                            <td data-label="Gênero">{{ $livro->genero }}</td>
                            <td data-label="Edição">{{ $livro->edicao }}</td>
                            <td data-label="Páginas">{{ $livro->num_paginas }}</td>
                            <td data-label="ISBN">{{ $livro->isbn }}</td>
                            <td data-label="Data">{{ Carbon\Carbon::parse($livro->data)->format('d/m/Y') }}</td>
                            <td data-label="Descrição" class="descrição">{{ $livro->descricao }}</td>
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
    </main>



    @include('includes.footer')
</body>

</html>
