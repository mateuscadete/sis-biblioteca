<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Etec Zona Leste</title>
    <link rel="stylesheet" href="{{ asset('css/navbar1.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>

<body>

    <header>
        @include('includes.navbar1')
    </header>
    <form action="{{ route('contato.submit') }}" method="POST">
        @csrf
        <div>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
        </div>
        <div>
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="assunto">Assunto:</label>
            <textarea id="assunto" name="assunto" rows="5" required></textarea>
        </div>
        <div>
            <button type="submit">Enviar</button>
        </div>
    </form>
    </header>

    @include('includes.footer')

</body>

</html>