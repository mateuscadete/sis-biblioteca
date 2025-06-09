<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('imagens/logo.png') }}" type="image/x-icon">
    <title>Biblioteca Etec Zona Leste</title>
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <script>
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('/sw.js')
                .then(reg => console.log('SW registrado:', reg))
                .catch(err => console.log('Erro ao registrar o SW:', err));
        }
    </script>


    @if(session('success'))
    <script>
        alert("{{ session('success') }}");
    </script>
    @endif


</head>

<body>
    @include('includes.navbar')

    <header>
        <img src="{{ asset('imagens/biblioteca1.jpg') }}" alt="Logo da Biblioteca Etec Zona Leste" style="width: 100%; height: 100vh; object-fit: cover;">


        @guest
        @endguest

        <div class="titulo">
            <h1>Bem-Vindo à<br> biblioteca<br>Etec Zona Leste</h1>
        </div>
    </header>
    <main>

        <section class="assuntos">

            <h2>Assunto</h2>
            <h3>Acesse livros para os seus estudos </h3>

            <div class="container">

                <div class="card">
                    <div class="caixaImg">
                        <img src="{{url('imagens/contabilidade.jpg') }}">
                    </div>
                    <div class="conteudo">
                        <h2>Contabilidade</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus quod excepturi neque illum consectetur. Quasi maxime obcaecati, non culpa tempora modi</p>
                        <a href="#">Acessar Livros</a>
                    </div>

                </div>

                <div class="card">
                    <div class="caixaImg">
                        <img src="{{url('imagens/tecnologia.jpg')}}">
                    </div>
                    <div class="conteudo">
                        <h2>Tecnologia</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos magni quo ad. Omnis quibusdam consequatur quod adipisci reprehenderit? Quis in aliquam dicta nobis </p>
                        <a href="#">Acessar Livros</a>

                    </div>

                </div>

                <div class="card">
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
                    <img src="https://m.media-amazon.com/images/I/316Rn0ogOBL._SY445_SX342_.jpg"
                        alt="Livro 1">
                    <h4>PHP&MySql: Desenvolvimento Web no lado do servidor</h4>
                    <p>Autor: Jon Duckett</p>
                    <a href="{{route('layout.acervo')}}">Consultar Acervo</a>

                </div>
                <div class="book">
                    <img src="https://www.jurua.com.br/images/prod/s/22/22246.jpg?ts=20201205" alt="Livro 2">
                    <h4>Contabilidade Geral:Noções do Sistema Contábil</h4>
                    <p>Autor: Anélio Berti</p>
                    <a href="{{route('layout.acervo')}}">Consultar Acervo</a>

                </div>
                <div class="book">
                    <img src="https://www.editoradodireito.com.br/media/catalog/product/9/7/9788502618350.170.png?optimize=low&bg-color=255,255,255&fit=bounds&height=1000&width=700&canvas=700:1000"
                        alt="Livro 3">
                    <h4>Administração da Produção</h4>
                    <p>Autor: Petrônio Martins & Fernando Laugeni</p>
                    <a href="{{route('layout.acervo')}}">Consultar Acervo</a>

                </div>

                <div class="book">
                    <img src="https://m.media-amazon.com/images/I/419GCs0Mw7L._SY445_SX342_.jpg"
                        alt="Livro 4">
                    <h4>Quimica Essencial Para Leigos</h4>
                    <p>Autor: John T. Moore</p>
                    <a href="{{route('layout.acervo')}}">Consultar Acervo</a>

                </div>

                <div class="book">
                    <img src="https://static.dinamize.com.br/dinamizeszmsdg3x/uploads/2024/06/livro-biblia-marketing-digital.png"
                        alt="Livro 3">
                    <h4>A Bíblia do Marketing Digital</h4>
                    <p>Autor: Cláudio Torres</p>
                    <a href="{{route('layout.acervo')}}">Consultar Acervo</a>

                </div>

                <div class="book">
                    <img src="https://m.media-amazon.com/images/I/41mCNNXbSdL._SY445_SX342_.jpg"
                        alt="Livro 6">
                    <h4>O Cérebro Que Julga: Neurociência Para Juristas</h4>
                    <p>Autor: Rosivaldo Toscano</p>
                    <a href="{{route('layout.acervo')}}">Consultar Acervo</a>

                </div>



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
                    <img src="{{url('imagens/cadete.jpg')}}" />
                    <div class="info">
                        <span class="role">Aluno</span>
                        <strong> Mateus Cadete</strong>
                        <strong>Desenvolvimento de Sistemas</strong>
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
                    <img src="{{url('imagens/felipe.jpeg')}}" />
                    <div class="info">
                        <span class="role">Aluno</span>
                        <strong>Felipe Gabriel</strong>
                        <strong>Química</strong>
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
                    <img src="{{url('imagens/davi.png')}}" alt="Davi Lucas" />
                    <div class="info">
                        <span class="role">Aluno</span>
                        <strong>Davi Lucas</strong>
                        <strong>Desenvolvimento de Sistemas</strong>
                    </div>

                </div>
            </div>


        </div>
    </section>


    <section class="adicionais">
        <div class="map">

            <div class="card-text">
                <h2>Conheça nossa biblioteca</h2>
                <p>Localização</p>
            </div>
        </div>
        <a href="https://oglobo.globo.com/cultura/livros/ " target="_blank">
            <div class="noticias">
                <div class="card-text ">
                    <h3>Fique por dentro!</h3>
                    <h2>Novidades do mundo literário</h2>
                </div>
                <div class="new-image">
                    <img src="{{ asset('imagens/books.png') }}">
                </div>
            </div>
        </a>
    </section>










    @include('includes.footer')



</body>

</html>