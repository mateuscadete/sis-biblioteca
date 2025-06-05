<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
@include('includes.navbar')

    <div class="w-full max-w-4xl bg-white rounded-lg shadow-lg overflow-hidden flex">
        <!-- Lado esquerdo: Formulário -->
        <div class="w-1/2 p-10">
            <h2 class="text-2xl font-bold text-green-900 mb-6">Cadastro</h2>

            @if ($errors->any())
                <div class="mb-4 text-red-600 text-sm">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nome</label>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        placeholder="Nome completo"
                        required
                        class="mt-1 block w-full rounded-md border border-gray-300 focus:border-green-900 focus:ring-green-900"
                    >
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        placeholder="Insira seu e-mail"
                        required
                        class="mt-1 block w-full rounded-md border border-gray-300 focus:border-green-900 focus:ring-green-900"
                    >
                </div>

                <div class="mb-6">
    <label for="password" class="block text-sm font-medium text-gray-700">Senha</label>
    <input
        type="password"
        name="password"
        id="password"
        placeholder="Senha com no mínimo 6 caracteres"
        required
        class="mt-1 block w-full rounded-md border border-gray-300 focus:border-green-900 focus:ring-green-900"
    >
</div>

<!-- Campo de confirmação de senha adicionado -->
<div class="mb-6">
    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirme a Senha</label>
    <input
        type="password"
        name="password_confirmation"
        id="password_confirmation"
        placeholder="Repita a senha"
        required
        class="mt-1 block w-full rounded-md border border-gray-300 focus:border-green-900 focus:ring-green-900"
    >
</div>


                <button
                    type="submit"
                    class="mt-4 w-full bg-custom-green text-white py-2 px-4 rounded hover:bg-custom-green-hover transition"
                >
                    Cadastrar
                </button>
            </form>
        </div>

        <!-- Lado direito: mensagem de boas-vindas (sem botão de login) -->
        <div class="w-1/2 bg-green-900 text-white flex items-center justify-center p-10">
            <div class="text-center">
                <h2 class="text-2xl font-bold mb-2">Seja Bem-Vindo</h2>
                <p class="text-sm"> </p> <!-- Texto pode ser ajustado ou removido -->
            </div>
        </div>
    </div>
</body>
</html>
