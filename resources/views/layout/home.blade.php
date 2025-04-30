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
        <img src="{{url('imagens/biblioteca.jpg')}}" style="object-fit: cover; width: 100%; height: 100%; ">

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

                <div class="card" style="color:var(--cor0)">
                    <div class="caixaImg">
                        <img src="{{url('imagens/contabilidade.jpg') }}">
                    </div>
                    <div class="conteudo">
                        <h2>Contabilidade</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus quod excepturi neque illum consectetur. Quasi maxime obcaecati, non culpa tempora modi</p>
                        <a href="#">Acessar Livros</a>
                    </div>

                </div>

                <div class="card" style="color:#009688;">
                    <div class="caixaImg">
                        <img src="{{url('imagens/tecnologia.jpg')}}">
                    </div>
                    <div class="conteudo">
                        <h2>Tecnologia</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos magni quo ad. Omnis quibusdam consequatur quod adipisci reprehenderit? Quis in aliquam dicta nobis </p>
                        <a href="#">Acessar Livros</a>

                    </div>

                </div>

                <div class="card" style="color:var(--cor1)">
                    <div class="caixaImg">
                        <img src="{{ url('imagens/natureza.jpg')}}">
                    </div>
                    <div class="conteudo">
                        <h2>Ciências Naturais</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum reiciendis culpa officiis ratione itaque quae corrupti maiores laborum quasi!</p>
                        <a href="#">Acessar Livros</a>
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
                    <h4>PHP 5: Conceitos e integração com banco de dados</h4>
                    <p>Autor: Wallace Soares</p>

                </div>
                <div class="book">
                    <img src="https://www.jurua.com.br/images/prod/s/22/22246.jpg?ts=20201205" alt="Livro 2">
                    <h4>Contabilidade Geral</h4>
                    <p>Autor: Anélio Berti</p>

                </div>
                <div class="book">
                    <img src="https://www.editoradodireito.com.br/media/catalog/product/9/7/9788502618350.170.png?optimize=low&bg-color=255,255,255&fit=bounds&height=1000&width=700&canvas=700:1000"
                        alt="Livro 3">
                    <h4>Administração da Produção</h4>
                    <p>Autor: Petrônio Martins & Fernando Laugeni</p>

                </div>

                <br>
                <br>

                
            </div>
        </section>
    </main>

    <section class="containerfeed">

        <div class="title">

            <h2>Feedback dos nossos acadêmicos</h2>
        </div>

        <div class="feedbacks">
            <div class="feedback">
                <p>
                "O software facilitou muito o meu trabalho diário.
                 Agora consigo organizar os livros com mais eficiência e tenho acesso rápido às informações dos usuários. 
                 A interface é simples e intuitiva, o que torna o processo de cadastro e empréstimo bem ágil."
                </p>
                <div class="user">
                    <img src="#" />
                    <div class="info">
                        <span class="role">Aluno</span>
                        <strong> Maria/strong>
                    </div>
                </div>
            </div>

            <div class="feedback">
                <p>
                "Gostei bastante de como o sistema agiliza a busca por livros. 
                Antes era difícil encontrar o que eu queria, mas agora posso fazer tudo pelo computador, 
                e o empréstimo também ficou bem mais rápido."
                </p>
                <div class="user">
                    <img src="#" />
                    <div class="info">
                        <span class="role">Professor</span>
                        <strong>João</strong>
                    </div>
                </div>
            </div>

            <div class="feedback">
                <p>
                "O software trouxe mais controle e transparência para a biblioteca.
                 Consigo monitorar o uso dos recursos e gerenciar os empréstimos de forma mais eficaz. 
                 A funcionalidade de relatórios é excelente para a tomada de decisões."
                </p>
                <div class="user">
                    <img src="#" alt="Mike Silva" />
                    <div class="info">
                        <span class="role">Aluno</span>
                        <strong>Ana</strong>
                    </div>

                </div>
            </div>

            <div class="buttonsfeed">
                <button>&larr;</button>
                <button>&rarr;</button>
            </div>
        </div>
    </section>




    @include('includes.footer')



</body>

</html>