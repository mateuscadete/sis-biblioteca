@extends('layout.telas')

@section('content')
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    padding: 0;
}

.container {
    margin-top: 20px;
    padding: 20px;
    background: #ffffff;
    border-radius: 8px;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
}

.card {
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    padding: 20px;
    max-width: 600px;
    margin: 40px auto;
}

.card-header {
    background-color: #007bff;
    color: #ffffff;
    font-weight: bold;
    padding: 15px;
    border-radius: 8px 8px 0 0;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.card-header a {
    color: #ffffff;
    text-decoration: none;
    font-size: 14px;
}

.form-label {
    font-weight: bold;
    color: #333;
}

.form-control {
    border-radius: 5px;
    padding: 10px;
    border: 1px solid #ccc;
    transition: all 0.3s;
}

.form-control:focus {
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    outline: none;
}

.invalid-feedback {
    font-size: 0.875rem;
    color: #dc3545;
}

.btn-sm {
    padding: 8px 12px;
    font-size: 0.875rem;
    border-radius: 5px;
}

.btn-primary {
    background-color: #007bff;
}
</style>

<div class="card mt-4 mb-4 border-light shadow">

<div class="card-header d-flex justify-content-between align-items-center">
    <span>Login</span>
    <a href="{{ route('user.cadastro') }}" class="btn btn-info btn-sm">Cadastrar</a>
</div>

<div class="card-body">
    <x-alert />

    <form action="{{ route('login-user') }}" method="POST" class="row g-3">
        @csrf
        @method('POST')

        <!-- E-mail -->
        <div class="col-md-12">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="E-mail do usuário" value="{{ old('email') }}">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Senha -->
        <div class="col-md-12">
            <label for="password" class="form-label">Senha</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Digite sua senha">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Botão de envio -->
        <div class="col-12">
            <button type="submit" class="btn btn-primary btn-sm">Entrar</button>
        </div>
    </form>
</div>
</div>
@endsection
