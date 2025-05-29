<!-- Define o tipo do documento como HTML5 -->
<!DOCTYPE html>

<!-- Início do documento HTML, com idioma definido como português do Brasil -->
<html lang="pt-BR">

<head>
    <!-- Define a codificação de caracteres como UTF-8 -->
    <meta charset="UTF-8">

    <!-- Define o título da página exibido na aba do navegador -->
    <title>Biblioteca</title>

    <!-- Garante que o layout seja responsivo em dispositivos móveis -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Importa o CSS do Bootstrap 5 via CDN para estilização da página -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Barra de navegação superior -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <!-- Logo ou nome da marca com link para a rota principal dos usuários -->
            <a class="navbar-brand" href="{{ route('user.index') }}">Biblioteca</a>

            <!-- Botão que aparece em telas pequenas para expandir/ocultar o menu -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Itens do menu de navegação -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <!-- Link para a página de acervo de livros -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('layout.acervo') }}">Acervo</a>
                    </li>
                    <!-- Link para a página de empréstimos -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('emprestimos.index') }}">Empréstimos</a>
                    </li>
                    <!-- Link para a página de contato -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contato.index') }}">Contato</a>
                    </li>
                    <!-- Link para a página sobre o sistema ou organização -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('layout.sobre') }}">Sobre</a>
                    </li>
                </ul>

                <!-- Exibe o nome do usuário autenticado, se estiver logado -->
                @auth
                    <span class="navbar-text text-light me-2">Olá, {{ Auth::user()->name }}</span>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Seção principal de conteúdo da página -->
    <main class="py-4">
        <div class="container">
            <!-- Insere o conteúdo de outras views usando o template Blade do Laravel -->
            @yield('content')
        </div>
    </main>

    <!-- Importa os scripts JavaScript do Bootstrap 5 via CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
