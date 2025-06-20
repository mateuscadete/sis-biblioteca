<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/loginadm.css') }}">
    <link rel="icon" href="{{ asset('imagens/logo.png') }}" type="image/x-icon">
</head>

<body>
    <header>
        @include('includes.navbar')
    </header>

    <div class="container">

        <div class="left">
            <h1>Bem-Vindo<br>De Volta</h1>
            <p>Entre Como Administrador</p>


        </div>

        {{-- ... other HTML ... --}}

        <div class="right">
            <h2>Login<br> Administrador</h2>

            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <label for="email">E-mail</label>
                <br>
                <input class="email" id="email"
                    name="email"
                    type="email"
                    placeholder="Insira seu e-mail"
                    autocomplete="email"
                    required>


                <label for="password">Senha</label>
                <br>
                <input class="senha"
                    id="password"
                    name="password"
                    type="password"
                    placeholder="Digite sua senha"
                    autocomplete="current-password"
                    required>

                <button type="submit" class="logar">
                    Entrar
                </button>
            </form>
        </div>

        {{-- ... rest of HTML ... --}}
    </div>
</body>

</html>
