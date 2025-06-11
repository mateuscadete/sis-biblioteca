<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('imagens/logo.png') }}" type="image/x-icon">
    <title>Sobre Nós</title>
    <link rel="stylesheet" href="{{ asset('css/sobre.css') }}">



</head>

<body>
    @include('includes.navbar')
    <header>
        <img src="{{ asset('imagens/sobre3.jpg') }}" alt="Sobre a EastBooks" style="width: 100%; height: 100vh; object-fit: cover;">


        @guest
        @endguest

        <div class="titulo">
            <h1>Conheça um pouco<br> sobre a iniciativa<br>da <span class="logotipo">EastBooks</span></h1>
        </div>
    </header>
    <main>

        <h1>O que a EastBooks oferece?</h1>

        <section class="main-section top-content">
            <div class="text-block">
                <h2>Uma biblioteca com um melhor serviço</h2>
            </div>
            <div class="text-block">
                <p>O sistema facilita para os usuários encontrarem obras facilmente, fazerem empréstimos de forma independente e receberem alertas sobre os prazos, incentivando um uso mais consciente e eficiente do acervo.</p>
            </div>
        </section>

        <section class="main-section objective-section">
            <div class="objective-header">
                <h2>Nosso objetivo é incentivar a leitura e facilitar o acesso a ela</h2>
            </div>
            <div class="objective-paragraphs">
                <div class="text-block">
                    <p>Nosso sistema foi feito pra deixar o atendimento mais ágil e prático, facilitando o gerenciamento do acervo e ajudando a manter tudo mais organizado na hora de pegar ou devolver livros. Com a tecnologia, a gente oferece uma experiência bem mais moderna pra quem frequenta a biblioteca. </p>
                </div>
                <div class="text-block">
                    <p>Biblioteca digital torna mais fácil acessar o conhecimento de um jeito bem prático. Com recursos modernos, queremos criar um espaço onde alunos, professores e funcionários possam interagir e aprender juntos, de forma simples e bacana.</p>
                </div>
            </div>
        </section>

        <section class="main-section features-section">
            <h3>Um serviço mais prático</h3>
            <div class="feature-cards">
                <div class="card">
                    <span class="icon">&#128218;</span>
                    <h4>BIBLIOTECA E IA</h4>
                    <p>Tecnologias que permitem uma melhor experiência ao leitor</p>
                </div>
                <div class="card">
                    <span class="icon">&#128736;</span>
                    <h4>PLATAFORMA EFICAZ</h4>
                    <p>Busca e encontra livros de forma prática e fácil</p>
                </div>
                <div class="card">
                    <span class="icon">&#128737;</span>
                    <h4>GARANTIA DOS LIVROS</h4>
                    <p>Para uso acadêmico ou de conhecimento</p>
                </div>
            </div>
        </section>

        <div class="criadores-container">
            <h2 class="titulocriador">Criadores :</h2>
            <div class="criadores">
                <div class="criador">
                    <div class="icone">
                        <a href="https://github.com/JoelQuia" target="_blank">
                            <img src="{{url('imagens/joel.jpg')}}" alt="Joel"></a>
                    </div>
                    <h3>Joel Quia</h3>
                    <p>Desenvolvedor front-end</p>
                </div>
                <div class="criador">
                    <div class="icone">
                        <a href="https://github.com/mateuscadete" target="_blank">
                            <img src="{{url('imagens/cadete.jpg')}}" alt="Mateus"></a>
                    </div>
                    <h3>Mateus Cadete</h3>
                    <p>Manager e Desenvolvedor back-end</p>
                </div>
                <div class="criador">
                    <div class="icone">
                        <a href="https://github.com/Gabriel5454" target="_blank">
                            <img src="{{url('imagens/gabriel.png')}}" alt="Gabriel"></a>

                    </div>
                    <h3>Gabriel Martins</h3>
                    <p>Desenvolvedor back-end</p>
                </div>
                <div class="criador">
                    <div class="icone">
                        <a href="https://github.com/Nxgueira" target="_blank">
                            <img src="{{url('imagens/vitor.jpg')}}" alt="Vitor">
                        </a>
                    </div>
                    <h3>Victor Nogueira</h3>
                    <p>Tester</p>
                </div>
            </div>
        </div>
    </main>

    @include('includes.footer')
</body>

</html>
