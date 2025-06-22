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
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

</head>

<body>
    @include('includes.navbar')
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

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
            <div class="carousel-button">
                <button id="prevBtn" class="button prev">&#10094;</button> <button id="nextBtn" class="button next">&#10095;</button>
            </div>

            <div class="cards-carousel">
                <div class="container" id="conjunto-1">

                    <div class="card">
                        <div class="caixaImg">
                            <img src="{{url('imagens/contabilidade.jpg') }}">
                        </div>
                        <div class="conteudo">
                            <h2>Contabilidade</h2>
                            <p>Veja livros sobre a área que envolve a gestão e análise financeira de empresas e pessoas físicas, desde a abertura de um negócio até o seu fechamento.</p>
                            <a href="{{ route('layout.acervo') }}?busca=Contabilidade">Acessar livros </a>
                        </div>

                    </div>

                    <div class="card">
                        <div class="caixaImg">
                            <img src="{{url('imagens/tecnologia.jpg')}}">
                        </div>
                        <div class="conteudo">
                            <h2>Tecnologia</h2>
                            <p>Explore o ramo que desenvolve e gerencia sistemas de informação, utilizando ferramentas e técnicas computacionais para criar soluções tecnológicas. </p>
                            <a href="{{ route('layout.acervo') }}?busca=Tecnologia">Acessar livros </a>


                        </div>

                    </div>

                    <div class="card">
                        <div class="caixaImg">
                            <img src="{{ url('imagens/natureza.jpg')}}">
                        </div>
                        <div class="conteudo">
                            <h2>Ciências Naturais</h2>
                            <p>Conheça o mundo físico e natural, buscando entender como o universo e o mundo ao nosso redor funcionam.</p>
                            <a href="{{ route('layout.acervo') }}?busca=Ciências Naturais">Acessar livros </a>
                        </div>


                    </div>

                </div>

                <div class="container hidden" id="conjunto-2">
                    <div class="card">
                        <div class="caixaImg">
                            <img src="{{ url('imagens/historia.jpg') }}">
                        </div>
                        <div class="conteudo">
                            <h2>História</h2>
                            <p>Descubra eventos passados, civilizações antigas e a evolução da humanidade através dos séculos.</p>
                            <a href="{{ route('layout.acervo') }}?busca=História">Acessar livros </a>
                        </div>
                    </div>

                    <div class="card">
                        <div class="caixaImg">
                            <img src="{{ url('imagens/arte.jpg') }}">
                        </div>
                        <div class="conteudo">
                            <h2>Arte</h2>
                            <p>Explore as diversas formas de expressão artística, desde a pintura e escultura até a música e o teatro.</p>
                            <a href="{{ route('layout.acervo') }}?busca=Arte">Acessar livros </a>
                        </div>
                    </div>

                    <div class="card">
                        <div class="caixaImg">
                            <img src="{{ url('imagens/saude.jpg') }}">
                        </div>
                        <div class="conteudo">
                            <h2>Saúde</h2>
                            <p>Aprenda sobre bem-estar, nutrição, medicina e os cuidados essenciais para uma vida saudável.</p>
                            <a href="{{ route('layout.acervo') }}?busca=Saúde">Acessar livros </a>
                        </div>
                    </div>
                </div>

                <div class="container hidden" id="conjunto-3">
                    <div class="card">
                        <div class="caixaImg">
                            <img src="{{ url('imagens/literatura.jpg') }}">
                        </div>
                        <div class="conteudo">
                            <h2>Literatura</h2>
                            <p>Mergulhe em histórias cativantes, poesias e obras que moldaram a cultura e o pensamento humano.</p>
                            <a href="{{ route('layout.acervo') }}?busca=Literatura">Acessar livros </a>
                        </div>
                    </div>

                    <div class="card">
                        <div class="caixaImg">
                            <img src="{{ url('imagens/linguagens.jpg') }}">
                        </div>
                        <div class="conteudo">
                            <h2>Linguagens</h2>
                            <p>Aprofunde-se no estudo de idiomas, gramática, comunicação e a diversidade das línguas.</p>
                            <a href="{{ route('layout.acervo') }}?busca=Linguagens">Acessar livros </a>
                        </div>
                    </div>

                    <div class="card">
                        <div class="caixaImg">
                            <img src="{{ url('imagens/psicologia.jpg') }}">
                        </div>
                        <div class="conteudo">
                            <h2>Psicologia</h2>
                            <p>Entenda o comportamento humano, a mente e os processos cognitivos que nos definem.</p>
                            <a href="{{ route('layout.acervo') }}?busca=Psicologia">Acessar livros </a>
                        </div>
                    </div>
                </div>
            </div>


        </section>

        <section class="livros">
            <h2>Livros mais buscados</h2>
            <h3>Explore nossa biblioteca</h3>

            <div class="containerbooks">
                <div class="livro">
                    <img src="https://m.media-amazon.com/images/I/316Rn0ogOBL._SY445_SX342_.jpg" alt="Livro 1">
                    <h4>PHP&MySql: Desenvolvimento Web no lado do servidor</h4>
                    <p>Autor: Jon Duckett</p>
                    <a href="{{route('layout.acervo')}}">Consultar Acervo</a>
                </div>
                <div class="livro">
                    <img src="https://www.jurua.com.br/images/prod/s/22/22246.jpg?ts=20201205" alt="Livro 2">
                    <h4>Contabilidade Geral:Noções do Sistema Contábil</h4>
                    <p>Autor: Anelio Berti</p>
                    <a href="{{route('layout.acervo')}}">Consultar Acervo</a>
                </div>
                <div class="livro">
                    <img src="https://www.editoradodireito.com.br/media/catalog/product/9/7/9788502618350.170.png?optimize=low&bg-color=255,255,255&fit=bounds&height=1000&width=700&canvas=700:1000" alt="Livro 3">
                    <h4>Administração da Produção</h4>
                    <p>Autor: Petrônio Martins & Fernando Laugeni</p>
                    <a href="{{route('layout.acervo')}}">Consultar Acervo</a>
                </div>

                <div class="livro">
                    <img src="https://m.media-amazon.com/images/I/419GCs0Mw7L._SY445_SX342_.jpg" alt="Livro 4">
                    <h4>Quimica Essencial Para Leigos</h4>
                    <p>Autor: John T. Moore</p>
                    <a href="{{route('layout.acervo')}}">Consultar Acervo</a>
                </div>
                <div class="livro">
                    <img src="https://static.dinamize.com.br/dinamizeszmsdg3x/uploads/2024/06/livro-biblia-marketing-digital.png" alt="Livro 5">
                    <h4>A Bíblia do Marketing Digital</h4>
                    <p>Autor: Cláudio Torres</p>
                    <a href="{{route('layout.acervo')}}">Consultar Acervo</a>
                </div>
                <div class="livro">
                    <img src="https://m.media-amazon.com/images/I/41mCNNXbSdL._SY445_SX342_.jpg" alt="Livro 6">
                    <h4>O Cérebro Que Julga: Neurociência Para Juristas</h4>
                    <p>Autor: Rosivaldo Toscano</p>
                    <a href="{{route('layout.acervo')}}">Consultar Acervo</a>
                </div>
                <div class="livro">
                    <img src="https://m.media-amazon.com/images/I/51J-eKbtRZL._SY445_SX342_.jpg" alt="Livro 6">
                    <h4>Mundo Animal: Animais Brasileiros</h4>
                    <p>Autor: Camelot Editora</p>
                    <a href="{{route('layout.acervo')}}">Consultar Acervo</a>
                </div>
                <div class="livro">
                    <img src="https://m.media-amazon.com/images/I/418VLwcUXsL._SY445_SX342_.jpg" alt="Livro 6">
                    <h4>O Pequeno Príncipe</h4>
                    <p>Autor: Antoine de Saint-Exupéry</p>
                    <a href="{{route('layout.acervo')}}">Consultar Acervo</a>
                </div>



                <div class="livro hidden">
                    <img src="https://m.media-amazon.com/images/I/41PssLHOO-L._SY445_SX342_.jpg" alt="Livro 6">
                    <h4>História da Guerra do Peloponeso</h4>
                    <p>Autor: Tucídides </p>
                    <a href="{{route('layout.acervo')}}">Consultar Acervo</a>
                </div>
                <div class="livro hidden">
                    <img src="https://m.media-amazon.com/images/I/81WzW3xJb5L._SY466_.jpg" alt="Livro 6">
                    <h4>Os segredos da mente milionária</h4>
                    <p>Autor: T. Harv Eker </p>
                    <a href="{{route('layout.acervo')}}">Consultar Acervo</a>
                </div>
                <div class="livro hidden">
                    <img src="https://m.media-amazon.com/images/I/41htlT5B29S._SY445_SX342_.jpg" alt="Livro 6">
                    <h4>A psicologia financeira: lições sobre fortuna, ganância e felicidade</h4>
                    <p>Autor: Morgan Housel</p>
                    <a href="{{route('layout.acervo')}}">Consultar Acervo</a>
                </div>
                <div class="livro hidden">
                    <img src="https://m.media-amazon.com/images/I/41P9R02i5kL._SY445_SX342_.jpg" alt="Livro 6">
                    <h4>Aprendendo Git</h4>
                    <p>Autor: Anna Skoulikari </p>
                    <a href="{{route('layout.acervo')}}">Consultar Acervo</a>
                </div>
                <div class="livro hidden">
                    <img src="https://m.media-amazon.com/images/I/51rIoCqlvFL._SY445_SX342_.jpg" alt="Livro 6">
                    <h4>Goethe - A Metamorfose das Plantas</h4>
                    <p>Autor: Johann Wolfgang von Goethe</p>
                    <a href="{{route('layout.acervo')}}">Consultar Acervo</a>
                </div>
                <div class="livro hidden">
                    <img src="https://m.media-amazon.com/images/I/51U0zji18TL._SY445_SX342_.jpg" alt="Livro 6">
                    <h4>Os Criadores De Coincidências</h4>
                    <p>Autor: Yoav Blum</p>
                    <a href="{{route('layout.acervo')}}">Consultar Acervo</a>
                </div>
                <div class="livro hidden">
                    <img src="https://m.media-amazon.com/images/I/4143HhfEU4L._SY445_SX342_.jpg" alt="Livro 6">
                    <h4>Inteligência emocional</h4>
                    <p>Autor: Daniel Goleman</p>
                    <a href="{{route('layout.acervo')}}">Consultar Acervo</a>
                </div>
                <div class="livro hidden">
                    <img src="https://m.media-amazon.com/images/I/61qI7wxgWnL._SY466_.jpg" alt="Livro 6">
                    <h4>O Grande Livro do Excel - Intermediário e Avançado</h4>
                    <p>Autor: Robério Gonçalves</p>
                    <a href="{{route('layout.acervo')}}">Consultar Acervo</a>
                </div>
            </div>
            <button id="toggleLivrosBtn" class="btn-mostrar-mais">Mostrar Mais Livros</button>
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
                <div id="map-container" style="height: 150px; width: 100%; margin-top: 20px; margin-bottom: 20px;">
                    <div id="map" style="height: 100%; width: 100%;"></div>

                </div>


            </div>
        </div>
        <a href="https://oglobo.globo.com/cultura/livros/ " target="_blank">
            <div class="noticias">
                <div class="card-text ">
                    <h3>Fique por dentro!</h3>
                    <h2>Novidades do mundo literário</h2>
                    <h3>Tudo sobre seus autores e livros preferidos</h3>
                </div>
                <div class="new-image">
                    <img src="{{ asset('imagens/books.png') }}">
                </div>
            </div>
        </a>



    </section>




    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var map = L.map('map').setView([-23.556831106, -46.653830718], 16);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors'
            }).addTo(map);

            var marker = L.marker([-23.522973001296343, -46.47583217434977]).addTo(map);
            marker.bindPopup("Biblioteca Etec Zona Leste.").openPopup();

            map.on('click', function(e) {
                alert("Você clicou no mapa em " + e.latlng);
            });
        });
    </script>






    @include('includes.footer')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const containers = document.querySelectorAll('.container');
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            let currentIndex = 0;

            function showContainer(index) {
                if (index < 0) {
                    index = containers.length - 1;
                } else if (index >= containers.length) {
                    index = 0;
                }

                containers.forEach(container => {
                    container.classList.remove('active');
                    container.classList.add('hidden');
                });

                containers[index].classList.remove('hidden');
                void containers[index].offsetWidth;
                containers[index].classList.add('active');


                currentIndex = index;
            }


            nextBtn.addEventListener('click', function() {
                showContainer(currentIndex + 1);
            });


            prevBtn.addEventListener('click', function() {
                showContainer(currentIndex - 1);
            });


            showContainer(currentIndex);
        });


        document.addEventListener('DOMContentLoaded', function() {
            const toggleLivrosBtn = document.getElementById('toggleLivrosBtn');
            const livrosParaAlternar = document.querySelectorAll('.livro.hidden');
            let livrosExtrasVisiveis = false;

            toggleLivrosBtn.addEventListener('click', function() {
                if (!livrosExtrasVisiveis) {
                    livrosParaAlternar.forEach(function(livro) {
                        livro.classList.remove('hidden');
                    });
                    toggleLivrosBtn.textContent = 'Mostrar Menos Livros';
                    livrosExtrasVisiveis = true;
                } else {
                    livrosParaAlternar.forEach(function(livro) {
                        livro.classList.add('hidden');
                    });
                    toggleLivrosBtn.textContent = 'Mostrar Mais Livros';
                    livrosExtrasVisiveis = false;
                }
            });
        });
    </script>

</body>

</html>
