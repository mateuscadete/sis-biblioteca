<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('imagens/logo.png') }}" type="image/x-icon">
    <title>Nosso Acervo</title>
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/acervo.css') }}">
</head>

<body>

    <header>

        <img src="{{url('imagens/acervo.jpg')}}" style="object-fit: cover; width: 100%; height: 100%; ">

        <ul class="forms">
            <li><a href="{{ route('user.ajuda') }}">Admin</a></li>
            <li><a href="{{ route('user.login') }}">Login</a></li>
            <li><a href="{{ route('user.cadastro') }}">Cadastrar</a></li>
        </ul>

        @include('includes.navbar')



        <div class="titulo">
            <h1><span class="span-titulo">Explore</span> o Acervo<br>da Nossa <span
                    class="span-titulo">Biblioteca</span></h1>

        </div>



    </header>

    <main>

        <section class="livros">

            <div class="containerbooks">
                {{-- resources/views/layout/show.blade.php --}}
                <!DOCTYPE html>
                <html lang="pt-br">

                <head>
                    <meta charset="UTF-8">
                    <title>Lista de Livros</title>
                    <link rel="icon" href="{{ asset('imagens/logo.png') }}" type="image/x-icon">
                    <link rel="stylesheet"
                        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
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
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($livros as $livro)
                                    <tr>
                                        <td>
                                            @if ($livro->imagem)
                                                <img src="{{ asset('storage/' . $livro->imagem) }}" alt="Imagem do livro"
                                                    style="max-width: 80px;">
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
                                        <td>{{ \Carbon\Carbon::parse($livro->data)->format('d/m/Y') }}</td>
                                        <td>{{ $livro->descricao }}</td>
                                    </tr>
                                @endforeach

                                @if (session('success'))
                                    <div style="color: green; padding: 10px;">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                @if (session('error'))
                                    <div style="color: red; padding: 10px;">
                                        {{ session('error') }}
                                    </div>
                                @endif


                                @foreach ($livros as $livro)
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $livro->titulo }}</h5>
                                            <p class="card-text">Autor: {{ $livro->autor }}</p>
                                            <p class="card-text">Quantidade disponível: {{ $livro->qtde }}</p>

                                            @if($livro->qtde > 0)
                                                <form action="{{ url('/emprestimos') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="livro_id" value="{{ $livro->id }}">
                                                    <button type="submit" class="btn btn-primary">Solicitar Empréstimo</button>
                                                </form>
                                            @else
                                                <p class="text-danger">Fora de estoque</p>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </body>

                </html>


            </div>
        </section>
    </main>


    @include('includes.footer')


</body>

</html>