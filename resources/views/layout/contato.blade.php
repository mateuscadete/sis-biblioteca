<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('imagens/logo.png') }}" type="image/x-icon">
    <title>Contato</title>
    <link rel="stylesheet" href="{{ asset('css/navbar1.css') }}">
    <link rel="stylesheet" href="{{ asset('css/contato.css') }}">
</head>

<body>
    @include('includes.navbar1')

    <div class="container">

        <div class="left" style="background-image: url(imagens/contact.jpg);">
            <h2>Entre em Contato com a nossa biblioteca</h2>
        </div>

        <div class="right">

            <h2>Prencha as informações</h2>
            <form class="contato" action="{{ route('contato.submit') }}" method="POST">
                @csrf


                <label for="nome">Nome:</label>
                <input type="text" class="name" id="nome" name="nome" required>

                <label for="email">E-mail:</label>
                <input type="email" class="email" id="email" name="email" required>

                <label for="assunto">Assunto:</label>
                <textarea id="assunto" class="assunto" name="assunto" rows="5" required></textarea>

                <button class="enviar" type="submit">Enviar</button>

            </form>
        </div>
    </div>


    @include('includes.footer')

</body>

</html>