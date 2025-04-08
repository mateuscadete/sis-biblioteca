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

        <section class="assuntos">

            <h2>Assunto</h2>
            <h3>Acesse algum assunto didático</h3>

            <div class="container">

                <div class="card">
                    <div class="caixaImg">
                        <img src="../../../public/css/imagens/contabilidade.jpg">
                    </div>
                    <div class="conteudo">
                    </div>

                </div>

                <div class="card">
                    <div class="caixaImg">
                        <div class="conteudo">

                        </div>
                    </div>

                </div>

                <div class="card">
                    <div class="caixaImg">
                        <div class="conteudo">

                        </div>
                    </div>

                </div>

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

    @include('includes.footer')


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.min.js" integrity="sha384-VQqxDN0EQCkWoxt/0vsQvZswzTHUVOImccYmSyhJTp7kGtPed0Qcx8rK9h9YEgx+" crossorigin="anonymous"></script>
</body>

</html>
