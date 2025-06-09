<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('imagens/logo.png') }}" type="image/x-icon">
    <title>Nosso Acervo</title>
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <link rel="stylesheet" href="{{ asset('css/acervo.css') }}">

    <script>
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('/sw.js')
                .then(reg => console.log('SW registrado:', reg))
                .catch(err => console.log('Erro ao registrar o SW:', err));
        }
    </script>
</head>

<body>
    @include('includes.navbar')
    <header>

        <img src="{{url('imagens/acervo1.jpg')}}" style="object-fit: cover; width: 100%; height: 100%; ">

        @guest
        @endguest
        <div class="titulo">
            <h1><span class="span-titulo">Explore</span> o Acervo<br>da Nossa <span
                    class="span-titulo">Biblioteca</span></h1>

        </div>



    </header>

    <main>

    <center>
        <section class="livros">

            <h2>Lista de Livros</h2>
            <h3>Procure os livros de acordo a sua classificação</h3>
            <div class="containerbooks">

                <form method="GET" action="{{ route('layout.acervo') }}" class="form-livros">
                    <div class="pesquisar">
                        <input type="text" name="busca" value="{{ request('busca') }}" class="pesquisar livro" placeholder="Buscar no acervo">
                        <button type="submit" class="buscar">Buscar</button>
                    </div>
                </form>

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
                            <th>Quantidade disponível</th>
                            <th>Ação</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($livros as $livro)
                        <tr>
                            <td data-label="Capa"> {{-- Adicione data-label aqui --}}
                                @if ($livro->imagem)
                                <img src="{{ asset('storage/' . $livro->imagem) }}" alt="Imagem do livro" style="max-width: 80px;">
                                @else
                                <span>Sem imagem</span>
                                @endif
                            </td>
                            <td data-label="Título">{{ $livro->titulo }}</td> {{-- E aqui --}}
                            <td data-label="Autor">{{ $livro->autor }}</td>
                            <td data-label="Editora">{{ $livro->editora }}</td>
                            <td data-label="Gênero">{{ $livro->genero }}</td>
                            <td data-label="Edição">{{ $livro->edicao }}</td>
                            <td data-label="Páginas">{{ $livro->num_paginas }}</td>
                            <td data-label="ISBN">{{ $livro->isbn }}</td>
                            <td data-label="Data">{{ \Carbon\Carbon::parse($livro->data)->format('d/m/Y') }}</td>
                            <td data-label="Descrição">{{ $livro->descricao }}</td>
                            <td data-label="Quantidade disponível">{{ $livro->qtde }}</td>
                            <td data-label="Ação">
                                @if($livro->qtde > 0)
                                <form action="{{ url( '/emprestimos') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="livro_id" value="{{ $livro->id }}">
                                    <button type="submit" class="solicitar">Solicitar</button>
                                </form>
                                @else
                                <span class="status">Fora de estoque</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach

                        @if (session('success'))
                        <div class="sucesso">
                            {{ session('success') }}
                        </div>
                        @endif

                        @if (session('error'))
                        <div class="erro">
                            {{ session('error') }}
                        </div>
                        @endif
                    </tbody>
                </table>




            </div>
        </section>
    </center>
    </main>


    @include('includes.footer')


</body>

</html>
