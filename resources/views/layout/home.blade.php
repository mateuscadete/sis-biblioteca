<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Etec Zona Leste</title>

    <link rel="stylesheet" href="{{ asset('css/home.css') }}">



</head>

<body>
    <header>

        <ul class="forms">
            <li><a href="{{ route('user.ajuda') }}">Ajuda</a></li>
            <li><a href="{{ route('user.login') }}">Login</a></li>
            <li><a href="{{ route('user.cadastro') }}">Cadastrar</a></li>
        </ul>

        @include('includes.navbar')

        <div class="titulo">
            <h1>Bem-Vindo à<br> biblioteca<br>Etec Zona Leste</h1>

        </div>


    </header>
    <main>

        <section class="generos">

            <h2>Gêneros</h2>
            <h3>Acesse algum gênero</h3>

            <div class="containergeneros">
                <div class="cards" style="background-color:#33605a;">Literatura Brasileira</div>
                <div class="cards" style="background-color: #68462b;">História</div>
                <div class="cards" style="background-color:#ccc591;">Economia</div>
                <div class="cards" style="background-color:#0a3740">Tecnologia</div>
                <div class="cards" style="background-color: #005bc5;">Ficção Científica</div>

            </div>
        </section>






        <section class="livros">

            <h2>Livros mais buscados</h2>
            <h3>Explore nossa biblioteca</h3>


            <div class="containerbooks">
                <div class="book">
                    <img src="https://www.editoradodireito.com.br/media/catalog/product/9/7/9788536500317.154.png?optimize=low&bg-color=255,255,255&fit=bounds&height=1000&width=700&canvas=700:1000"
                        alt="Livro 1">
                    <h3>PHP 5: Conceitos e integração com banco de dados</h3>
                    <p>Autor: Wallace Soares</p>

                </div>
                <div class="book">
                    <img src="https://www.jurua.com.br/images/prod/s/22/22246.jpg?ts=20201205" alt="Livro 2">
                    <h3>Contabilidade Geral</h3>
                    <p>Autor: Anélio Berti</p>

                </div>
                <div class="book">
                    <img src="https://www.editoradodireito.com.br/media/catalog/product/9/7/9788502618350.170.png?optimize=low&bg-color=255,255,255&fit=bounds&height=1000&width=700&canvas=700:1000"
                        alt="Livro 3">
                    <h3>Administração da Produção</h3>
                    <p>Autor: Petrônio Martins & Fernando Laugeni</p>

                </div>
            </div>
        </section>
    </main>

    <aside class="feedback">
        <h2>Feedback dos nossos acadêmicos</h2>
        <div class="containerfeed">
            <div class="feed">
                <p>“A biblioteca da Etec Zona Leste é incrível! Sempre encontro o que procuro.”</p>
                <p>– João Silva</p>
            </div>

            <div class="feed">
                <p>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione officia illo excepturi aliquam
                    aspernatur modi, aliquid quidem deserunt amet error architecto iste facere, ea voluptates temporibus
                    esse vero dolore eveniet."</p>
            </div>

            <div class="feed">
                <p>"Lorem, ipsum dolor sit amet consectetur adipisicing elit. Id, veritatis nisi nemo beatae, aliquam
                    cumque iusto fugit dolorem sequi velit, reiciendis esse? Incidunt autem fuga dolorem quos, et
                    facilis asperiores"</p>
            </div>
        </div>
    </aside>

    <footer class="footer">
        <div>
            <img src="logo.png" alt="Logo">
            <p>Lorem ipsum dolor sit amet nulla adipiscing elit.</p>
            <p>info@mail.com</p>
            <p>+91 98765 43210</p>

        </div>
        <div>
            <h3>COMPANHIA</h3>
            <a href="#">Sobre</a>
            <a href="#">Criadores</a>
            <a href="#">Afiliados</a>
            <a href="#">Blog</a>
        </div>
        <div>
            <h3>BIBLIOTECA</h3>
            <a href="#">Funcionários</a>
            <a href="#">Etec</a>
            <a href="#">Livros</a>
            <a href="#">Como funciona</a>
        </div>
        <div>
            <h3>AJUDA</h3>
            <a href="#">Serviço e Atendimento</a>
            <a href="#">Minha Conta</a>
            <a href="#">Termos de Uso</a>
            <a href="#">Localização</a>
        </div>
    </footer>

</body>

</html>
