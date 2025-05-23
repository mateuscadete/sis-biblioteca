<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/navbar1.css') }}">
    <link rel="stylesheet" href="{{ asset('css/acervo.css') }}">
</head>

<body>
    @include ('includes.navbar1')

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


</body>

</html>