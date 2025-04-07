<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
</head>

<body>
    <header>
        @include('includes.navbar1')
    </header>


    <div class="container">
        <div class="left">
            <h1>Bem-Vindo<br>De Volta</h1>
            <p>Ainda não possui uma conta?</p>
            <a href="{{ route('user.cadastro') }}" class="cadastrar">Cadastrar</a>
        </div>

        <div class="right">

            <h2>Login</h2>

            <form class="login" action="{{ route('login-user') }}" method="POST">
                @csrf
                @method('POST')

                <!-- E-mail -->

                <label for="email">E-mail</label>

                <input type="email" name="email" class="email @error('email') is-invalid @enderror" id="email" placeholder="Insira seu e-mail" value="{{ old('email') }}">

                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror


                <!-- Senha -->

                <label for="password">Senha</label>
                <br><br>
                <input type="password" name="password" class="senha @error('password') is-invalid @enderror" id="password" placeholder="Digite sua senha">
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror


                <!-- Botão de envio -->

                <button type="submit" class="logar">Entrar</button>
                <a href="#" class="termos">Aceito os termos da biblioteca</a>



            </form>
        </div>
    </div>

</body>

</html>
