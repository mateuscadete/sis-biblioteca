<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/acervo.css') }}">
</head>

<body>


    @if (session('success'))
    <div style="color: green; padding: 10px;">
        {{ session('success') }}
    </div>
    @endif

    @if (session('error'))
    <div style="color: red; padding: 10px;">
        {{ session('error') }}
    </div>
    @endif


    @foreach ($livros as $livro)
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ $livro->titulo }}</h5>
            <p class="card-text">Autor: {{ $livro->autor }}</p>
            <p class="card-text">Quantidade disponível: {{ $livro->qtde }}</p>

            @if($livro->qtde > 0)
            <form action="{{ url('/emprestimos') }}" method="POST">
                @csrf
                <input type="hidden" name="livro_id" value="{{ $livro->id }}">
                <button type="submit" class="btn btn-primary">Solicitar Empréstimo</button>
            </form>
            @else
            <p class="text-danger">Fora de estoque</p>
            @endif
        </div>
    </div>
    @endforeach

    <header>

        <img src="{{url('imagens/acervo.jpg')}}" style="object-fit: cover; width: 100%; height: 100%; ">

        <ul class="forms">
            <li><a href="{{ route('user.ajuda') }}">Admin</a></li>
            <li><a href="{{ route('user.login') }}">Login</a></li>
            <li><a href="{{ route('user.cadastro') }}">Cadastrar</a></li>
        </ul>

        @include('includes.navbar')



        <div class="titulo">
            <h1><span class="span-titulo">Explore</span> o Acervo<br>da Nossa <span class="span-titulo">Biblioteca</span></h1>

        </div>



    </header>

    <main>







        <section class="livros">

            <h2>Livros mais buscados</h2>
            <h3>Explore nossa biblioteca</h3>


            <div class="containerbooks">
                <div class="book">
                    <img src="https://m.media-amazon.com/images/I/316Rn0ogOBL._SY445_SX342_.jpg"
                        alt="Livro 1">
                    <h4>PHP&MySql: Desenvolvimento Web no lado do servidor</h4>
                    <p>Autor: Jon Duckett</p>
                    <a href="#">Ver Detalhes</a>

                </div>
                <div class="book">
                    <img src="https://www.jurua.com.br/images/prod/s/22/22246.jpg?ts=20201205" alt="Livro 2">
                    <h4>Contabilidade Geral:Noções do Sistema Contábil</h4>
                    <p>Autor: Anélio Berti</p>
                    <a href="#">Ver Detalhes</a>

                </div>
                <div class="book">
                    <img src="https://www.editoradodireito.com.br/media/catalog/product/9/7/9788502618350.170.png?optimize=low&bg-color=255,255,255&fit=bounds&height=1000&width=700&canvas=700:1000"
                        alt="Livro 3">
                    <h4>Administração da Produção</h4>
                    <p>Autor: Petrônio Martins & Fernando Laugeni</p>
                    <a href="#">Ver Detalhes</a>

                </div>

                <div class="book">
                    <img src="https://m.media-amazon.com/images/I/419GCs0Mw7L._SY445_SX342_.jpg"
                        alt="Livro 4">
                    <h4>Quimica Essencial Para Leigos</h4>
                    <p>Autor: John T. Moore</p>
                    <a href="#">Ver Detalhes</a>

                </div>

                <div class="book">
                    <img src="https://www.editoradodireito.com.br/media/catalog/product/9/7/9788502618350.170.png?optimize=low&bg-color=255,255,255&fit=bounds&height=1000&width=700&canvas=700:1000"
                        alt="Livro 3">
                    <h4>Administração da Produção</h4>
                    <p>Autor: Petrônio Martins & Fernando Laugeni</p>
                    <a href="#">Ver Detalhes</a>

                </div>

                <div class="book">
                    <img src="https://m.media-amazon.com/images/I/41mCNNXbSdL._SY445_SX342_.jpg"
                        alt="Livro 6">
                    <h4>O Cérebro Que Julga: Neurociência Para Juristas</h4>
                    <p>Autor: Rosivaldo Toscano</p>
                    <a href="#">Ver Detalhes</a>

                </div>



            </div>
        </section>
    </main>


    @include('includes.footer')


</body>

</html>
