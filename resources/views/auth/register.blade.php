<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Cadastro Administrador</title>
    <link rel="stylesheet" href="{{ asset('css/cadastroadmin.css') }}">
    <link rel="icon" href="{{ asset('imagens/logo.png') }}" type="image/x-icon">
</head>

<body>
    <header>
        @include('includes.navbar')
    </header>

    <div class="container">

        <div class="left">
            <h2>Cadastro</h2>

            {{-- Status Message (e.g., after successful registration, redirect with a message) --}}
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif

            {{-- Error Messages --}}
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf


                <label for="name">Nome</label>
                <br>
                <input
                    type="text"
                    name="name"
                    id="name"
                    placeholder="Nome completo"
                    required
                    class="name">



                <label for="email">E-mail</label>
                <br>
                <input
                    type="email"
                    name="email"
                    id="email"
                    placeholder="Insira seu e-mail"
                    required
                    class="email">



                <label for="password ">Senha</label>
                <br>
                <input
                    type="password"
                    name="password"
                    id="password"
                    placeholder="Senha com no mínimo 6 caracteres"
                    required
                    class="senha">



                <label for="password_confirmation">Confirme a Senha</label>
                <br>
                <input
                    type="password"
                    name="password_confirmation"
                    id="password_confirmation"
                    placeholder="Repita a senha"
                    required
                    class="senha">



                <button
                    type="submit"
                    class="cadastrar">
                    Cadastrar
                </button>
            </form>
        </div>


        <div class="right">

            <h1>Seja Bem-Vindo</h1>
            <p>Cadastre-se como Administrador</p>
        </div>
    </div>
</body>

</html>
