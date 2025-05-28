<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nós</title>
    <link rel="stylesheet" href="{{ asset('css/sobre.css') }}">



</head>

<body>

    <header>
        <img src="{{url('imagens/sobre2.jpg')}}" style="object-fit: cover; width: 100%; height: 100%; ">

        <ul class="forms">
            <li><a href="{{ route('user.ajuda') }}">Ajuda</a></li>
            <li><a href="{{ route('user.login') }}">Login</a></li>
            <li><a href="{{ route('user.cadastro') }}">Cadastrar</a></li>
        </ul>

        @include('includes.navbar')

        <div class="titulo">
            <h1>Conheça um pouco<br> sobre a iniciativa<br>da plataforma</h1>

        </div>



    </header>
    <main>

        <section class="main-section top-content">
            <div class="text-block">
                <h2>Uma biblioteca com um melhor serviço</h2>
            </div>
            <div class="text-block">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc maximus, nulla ut commodo sagittis, sapien dui mattis dui, non pulvinar lorem felis nec erat</p>
            </div>
        </section>

        <section class="main-section objective-section">
            <div class="objective-header">
                <h2>Nosso objetivo é incentivar a leitura e facilitar o acesso a ela</h2>
            </div>
            <div class="objective-paragraphs">
                <div class="text-block">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc maximus, nulla ut commodo sagittis, sapien dui mattis dui, non pulvinar lorem felis nec erat</p>
                </div>
                <div class="text-block">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc maximus, nulla ut commodo sagittis, sapien dui mattis dui, non pulvinar lorem felis nec erat</p>
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
    </main>

    @include('includes.footer')
</body>

</html>