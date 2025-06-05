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

        <section class="livros">

            <div class="containerbooks">
                <div class="container mt-4">

                    <h2>Lista de Livros</h2>

                    <form method="GET" action="{{ route('layout.acervo') }}" class="row g-3 mb-4">
                        <div class="col-md-4">
                            <input type="text" name="busca" value="{{ request('busca') }}" class="form-control" placeholder="Buscar no acervo">
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-secondary">Buscar</button>
                        </div>
                    </form>

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
                                <th>Ação</th>
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
                                <td>
                                    @if($livro->qtde > 0)
                                    <form action="{{ url( '/emprestimos') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="livro_id" value="{{ $livro->id }}">
                                        <button type="submit" class="btn btn-primary btn-sm">Solicitar</button>
                                    </form>
                                    @else
                                    <span class="text-danger">Fora de estoque</span>
                                    @endif

                                </td>
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
                        </tbody>
                    </table>
                </div>



            </div>
        </section>
    </main>


    @include('includes.footer')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            const navbarLinks = document.getElementById('navbar-links');
            const navbarActions = document.querySelector('.navbar-actions');

            if (mobileMenu && navbarLinks && navbarActions) {
                mobileMenu.addEventListener('click', function() {
                    mobileMenu.classList.toggle('active');
                    navbarLinks.classList.toggle('active');
                    navbarActions.classList.toggle('active');
                });
            }


            const userMenuButton = document.getElementById('user-menu-button');
            const userDropdownContent = document.getElementById('user-dropdown-content');

            if (userMenuButton && userDropdownContent) {
                userMenuButton.addEventListener('click', function(event) {
                    event.stopPropagation();
                    userDropdownContent.classList.toggle('show');

                    const isExpanded = userMenuButton.getAttribute('aria-expanded') === 'true';
                    userMenuButton.setAttribute('aria-expanded', !isExpanded);
                });


                document.addEventListener('click', function(event) {
                    if (!userMenuButton.contains(event.target) && !userDropdownContent.contains(event.target)) {
                        if (userDropdownContent.classList.contains('show')) {
                            userDropdownContent.classList.remove('show');
                            userMenuButton.setAttribute('aria-expanded', 'false');
                        }
                    }
                });
            }
        });
    </script>

</body>

</html>
