<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    @vite('resources/css/app.css') <!-- Certifique-se de usar Vite corretamente -->
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">



    <div class="flex w-full max-w-4xl bg-white rounded-lg shadow-lg overflow-hidden">
        <!-- Coluna da esquerda (boas-vindas) -->
       <div class="w-1/2 bg-custom-green text-white flex flex-col items-center justify-center p-10">
            <h2 class="text-3xl font-bold mb-4 text-center">Bem-Vindo<br>De Volta</h2>
            
        
        </div>

        <!-- Coluna da direita (formulário de login) -->
        <div class="w-1/2 p-10">
            <h2 class="text-2xl font-bold text-green-900 mb-6">Login</h2>

            @if (session('status'))
                <div class="mb-4 text-green-600 text-sm">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-4 text-red-600 text-sm">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
                    <input
                        id="email"
                        name="email"
                        type="email"
                        placeholder="Insira seu e-mail"
                        autocomplete="email"
                        required
                        class="mt-1 block w-full rounded-md border border-green-900 focus:ring-green-900 focus:border-green-900"
                    >
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Senha</label>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        placeholder="Digite sua senha"
                        autocomplete="current-password"
                        required
                        class="mt-1 block w-full rounded-md border border-green-900 focus:ring-green-900 focus:border-green-900"
                    >
                </div>

                <button
                    type="submit"
                    class="mt-4 w-full bg-custom-green text-white py-2 px-4 rounded hover:bg-custom-green-hover transition"
                >
                    Entrar
                </button>
            </form>
        </div>
    </div>
</body>
</html>
