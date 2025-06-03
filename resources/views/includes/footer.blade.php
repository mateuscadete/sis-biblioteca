<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">

</head>
<footer>
    <div class="footer-section about-us">
        <img src="{{ asset('imagens/logo.png') }}" alt="Logo da Biblioteca Etec Zona Leste" class="logo">
        <h2>Uma Plataforma Para Sua Biblioteca</h2>
        <p>Acesse Nossas Redes e Repositório</p>
        <div class="icones">
            <a href="https://www.facebook.com" target="_blank" aria-label="Link para o Facebook">
                <img src="{{ asset('imagens/facebook.svg') }}" alt="Facebook">
            </a>
            <a href="https://www.instagram.com" target="_blank" aria-label="Link para o Instagram">
                <img src="{{ asset('imagens/instagram.svg') }}" alt="Instagram">
            </a>
            <a href="https://github.com/mateuscadete/sis_biblioteca" target="_blank" aria-label="Link para o GitHub">
                <img src="{{ asset('imagens/git.svg') }}" alt="GitHub">
            </a>
        </div>
    </div>

    <div class="footer-section">
        <h3>CONTAS</h3>
        <ul>
        <li><a href="{{ route('dashboard') }}">Administrador</a></li>
            <li><a href="{{ route('user.login') }}">Login</a></li>
            <li><a href="{{ route('user.cadastro') }}">Cadastrar</a></li>
        </ul>
    </div>

    <div class="footer-section">
        <h3>BIBLIOTECA</h3>
        <ul>
            <li><a href="#">Etec</a></li>
            <li><a href="{{ route('layout.acervo') }}">Livros</a></li>
            <li><a href="{{route('layout.sobre')}}">Sobre</a></li>
        </ul>
    </div>

    <div class="footer-section">
        <h3>AJUDA</h3>
        <ul>
            <li><a href="#">Minha Conta</a></li>
            <li><a href="#">Termos de Uso</a></li>
            <li><a href="#">Política de Privacidade</a></li>
        </ul>
    </div>

    <div class="footer-bottom">
        <hr>
        <p>Copyright © 2025 Biblioteca Etec Zona Leste. Todos Os Direitos Reservados</p>
    </div>
</footer>

</html>
