@extends('layout.telas')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Inter:wght@100..900&family=League+Spartan:wght@100..900&display=swap');

    @font-face {
        font-family: 'Android';
        src: url('fontes/idroid.otf') format('opentype');
        font-weight: normal;
    }
    .navbar {
    position: absolute; /* Fixa no topo */
    top: 0;
    left: 0;
    width: 100%;
    background-color: #d3b58d; /* Cor similar à sua */
    padding: 10px 20px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    z-index: 1000; /* Garante que fique acima de outros elementos */
}
 .btn-container {
    position: absolute; /* Fixa no topo */
    top: 0;
    left: 0;
    width: 100%;
    background-color: #d3b58d; /* Cor similar à sua */
    padding: 10px 20px;
    display: flex;
    align-items: center;
    justify-content: space-between;

}
    :root {
        --cor0: rgb(51, 96, 90);
        --cor1: rgb(26, 61, 57);
        --cor2: #91a398;
        --cor3: #7d9987;
        --cor4: #e9e0d1;
        --cor5: #68462b;
        --cor6: #382414;
        --fonte0: arial, verdana, helvetica, sans-serif;
        --fonte1: 'bebas neue', cursive;
        --fonte2: 'Android', cursive;
    }

    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        font-family: Arial, sans-serif;
        background-color: #f5f5f5;
    }

    .container {
        display: flex;
        width: 800px;
        background: white;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        overflow: hidden;
    }

    .left {
        background-color: #2f4f4f;
        color: white;
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 40px;
    }

    .cadastrar {
        background: transparent;
        border: 1px solid white;
        border-radius: 5px;
        text-decoration: none;
        color: white;
        padding: 10px 20px;
        cursor: pointer;
        margin-top: 10px;
    }

    .right {
        flex: 1;
        padding: 40px;
    }

    form {
        display: flex;
        flex-direction: column;
    }

    input {
        margin-bottom: 15px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .logar {
        background-color: #2f4f4f;
        color: white;
        border: 1px solid white;
        padding: 10px;
        cursor: pointer;
        border-radius: 5px;
    }

    .termos {
        display: flex;
        align-items: center;
        margin-top: 10px;
        color: var(--cor1);
    }









    .invalid-feedback {
        font-size: 0.875rem;
        color: #dc3545;
    }
</style>

<div class="container">
    <div class="left">
        <h1>Bem-Vindo<br>De Volta</h1>
        <p>Ainda não possui uma conta?</p>
        <a href="{{ route('user.cadastro') }}" class="cadastrar">Cadastrar</a>
    </div>

    <div class="right">

        <h2>Login</h2>

        <form action="{{ route('login-user') }}" method="POST">
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
@endsection
