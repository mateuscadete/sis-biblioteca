<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ url('css/navbar.css') }}">
</head>

<body>
    <nav class="navbar">
        <a href="{{ route('user.index') }}" class="navbar-logo">
            <img src="{{ asset('imagens/logo.png') }}" class="navbar-img">
        </a>

        <div class="menu-toggle" id="mobile-menu">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>

        <ul class="links" id="navbar-links">

            <li><a href="{{ route('layout.acervo') }}">Nosso Acervo</a></li>
            <li><a href="{{route('emprestimos.index')}}">Meus Empréstimos</a></li>
            <li><a href="{{ route('layout.sobre') }}">Sobre</a></li>
            <li><a href="{{ route('contato.submit') }}">Contato</a></li>


        </ul>

        <div class="navbar-actions">
            <div class="search-container">
                <form action="{{ route('buscar.pagina') }}" method="GET" class="search-form" role="search">
                    <label for="search-input" class="sr-only">Buscar página...</label>
                    <input type="text" name="termo" id="search-input" placeholder="Buscar página..." class="search-input" required aria-label="Campo de busca">
                    <button type="submit" class="search-button" aria-label="Pesquisar">
                        <svg fill="#382414" width="20px" height="20px" viewBox="0 0 1920 1920" xmlns="http://www.w3.org/2000/svg">
                            <path d="M790.588 1468.235c-373.722 0-677.647-303.924-677.647-677.647 0-373.722 303.925-677.647 677.647-677.647 373.723 0 677.647 303.925 677.647 677.647 0 373.723-303.924 677.647-677.647 677.647Zm596.781-160.715c120.396-138.692 193.807-319.285 193.807-516.932C1581.176 354.748 1226.428 0 790.588 0S0 354.748 0 790.588s354.748 790.588 790.588 790.588c197.647 0 378.24-73.411 516.932-193.807l516.028 516.142 79.963-79.963-516.142-516.028Z" fill-rule="evenodd"></path>
                        </svg>
                    </button>
                </form>
            </div>

            <div class="icones">
                <a href="{{ route('assistente.ia') }}" class="icon-button" aria-label="Acessa IA">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-robot" viewBox="0 0 16 16">
                        <path d="M6 12.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5M3 8.062C3 6.76 4.235 5.765 5.53 5.886a26.6 26.6 0 0 0 4.94 0C11.765 5.765 13 6.76 13 8.062v1.157a.93.93 0 0 1-.765.935c-.845.147-2.34.346-4.235.346s-3.39-.2-4.235-.346A.93.93 0 0 1 3 9.219zm4.542-.827a.25.25 0 0 0-.217.068l-.92.9a25 25 0 0 1-1.871-.183.25.25 0 0 0-.068.495c.55.076 1.232.149 2.02.193a.25.25 0 0 0 .189-.071l.754-.736.847 1.71a.25.25 0 0 0 .404.062l.932-.97a25 25 0 0 0 1.922-.188.25.25 0 0 0-.068-.495c-.538.074-1.207.145-1.98.189a.25.25 0 0 0-.166.076l-.754.785-.842-1.7a.25.25 0 0 0-.182-.135" />
                        <path d="M8.5 1.866a1 1 0 1 0-1 0V3h-2A4.5 4.5 0 0 0 1 7.5V8a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1v1a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-1a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1v-.5A4.5 4.5 0 0 0 10.5 3h-2zM14 7.5V13a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V7.5A3.5 3.5 0 0 1 5.5 4h5A3.5 3.5 0 0 1 14 7.5" />
                    </svg>
                </a>


                <div class="user-conta">
                    <button class="icon-button user-menu-button" aria-label="Acessar Minha Conta" aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                        </svg>
                    </button>

                    <div class=" logado user-dropdown-content">
                        @auth
                        @if (!Auth::user() ->is_admin)
                        <span class="user-logado">Olá, {{ Auth::user()->name }}</span>
                        @else
                        <span class="user-logado">Olá, {{ Auth::user()->name }}</span>
                        @endif

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="sair">Sair</button>
                        </form>
                        @else
                        <a href="{{ route('user.login') }}" class="linklogin">Login</a>
                        <a href="{{ route('user.cadastro') }}" class="linkcadastro">Cadastro</a>
                        <a href="{{route('dashboard')}}" class="linklogin">Administrador</a>
                        @endauth
                    </div>
                </div>

                @auth
                @if (Auth::user() ->is_admin)
                <div class="user-conta">
                    <button class="icon-button user-menu-button" aria-label="Acessar Área do Admin" aria-haspopup="true" aria-expanded="false" id="user-menu-button">

                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-book-half" viewBox="0 0 16 16">
                            <path d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783" />
                        </svg>

                    </button>
                    <div class="logado user-dropdown-content">


                        <a href="{{route('dashboard')}} " class="admin">Cadastrar Livros</a>
                        <a href="{{route('layout.show')}}" class="admin">Lista De Livros</a>


                    </div>
                </div>
                @endif
                @endauth
            </div>
        </div>
    </nav>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            const navbarLinks = document.getElementById('navbar-links');
            const navbarActions = document.querySelector('.navbar-actions');

            if (mobileMenu && navbarLinks) {
                mobileMenu.addEventListener('click', function() {
                    mobileMenu.classList.toggle('active');
                    navbarLinks.classList.toggle('active');
                });
            }

            document.querySelectorAll('.user-menu-button').forEach(button => {
                const dropdownContent = button.nextElementSibling;
                if (dropdownContent && dropdownContent.classList.contains('user-dropdown-content')) {
                    button.addEventListener('click', function(event) {
                        event.stopPropagation();

                        document.querySelectorAll('.user-dropdown-content.show').forEach(openDropdown => {
                            if (openDropdown !== dropdownContent) {
                                openDropdown.classList.remove('show');
                                openDropdown.previousElementSibling.setAttribute('aria-expanded', 'false');
                            }
                        });

                        dropdownContent.classList.toggle('show');
                        const isExpanded = button.getAttribute('aria-expanded') === 'true';
                        button.setAttribute('aria-expanded', !isExpanded);
                    });

                    document.addEventListener('click', function(event) {
                        if (!button.contains(event.target) && !dropdownContent.contains(event.target)) {
                            if (dropdownContent.classList.contains('show')) {
                                dropdownContent.classList.remove('show');
                                button.setAttribute('aria-expanded', 'false');
                            }
                        }
                    });
                }
            });
        });
    </script>
</body>
