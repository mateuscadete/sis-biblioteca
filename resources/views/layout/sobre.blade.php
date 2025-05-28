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
     

    </main>

    @include('includes.footer')
</body>

</html>
