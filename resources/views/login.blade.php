<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Login and Signup</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/navbar1.css') }}">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>

<body class="font-roboto bg-gray-100">

    <nav>
        @include('includes.navbar1')
    </nav>
    <main class="flex justify-center items-center min-h-screen">
        <div id="signup-screen" class="flex w-full max-w-4xl">
            <div class="bg-white p-8 rounded-lg shadow-lg w-1/2 flex flex-col justify-center">
                <h2 class="text-2xl font-bold mb-6">Vamos criar sua primeira conta</h2>
                <form>
                    <div class="mb-4">
                        <label class="block text-gray-700" for="username">Username</label>
                        <input class="w-full p-2 border border-gray-300 rounded mt-1" id="username" type="text" />
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700" for="email">Email</label>
                        <input class="w-full p-2 order-grborder bay-300 rounded mt-1" id="email" type="email" />
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700" for="password">Crie uma senha</label>
                        <input class="w-full p-2 border border-gray-300 rounded mt-1" id="password" type="password" />
                    </div>
                    <button class="w-full bg-green-700 text-white p-2 rounded" type="submit">Cadastrar</button>
                    <p class="text-gray-600 text-sm mt-2">Aceito os termos da biblioteca</p>
                </form>
            </div>
            <div class="bg-green-700 text-white p-8 rounded-lg shadow-lg w-1/2 flex flex-col justify-center items-center relative">
                <div class="absolute top-0 right-0 h-full w-1/2 bg-green-700 rounded-l-full"></div>
                <h2 class="text-3xl font-bold mb-6 z-10">Seja Bem-Vindo</h2>
                <p class="mb-6 z-10">Já possui uma conta?</p>
                <button class="bg-white text-green-700 p-2 rounded z-10" id="show-login">Login</button>
            </div>
        </div>
        <div id="login-screen" class="flex w-full max-w-4xl hidden">
            <div class="bg-green-700 text-white p-8 rounded-lg shadow-lg w-1/2 flex flex-col justify-center items-center relative">
                <div class="absolute top-0 left-0 h-full w-1/2 bg-green-700 rounded-r-full"></div>
                <h2 class="text-3xl font-bold mb-6 z-10">Bem-Vindo De Volta</h2>
                <p class="mb-6 z-10">Ainda não possui uma conta?</p>
                <button class="bg-white text-green-700 p-2 rounded z-10" id="show-signup">Cadastrar</button>
            </div>
            <div class="bg-white p-8 rounded-lg shadow-lg w-1/2 flex flex-col justify-center">
                <h2 class="text-2xl font-bold mb-6">Login</h2>
                <form>
                    <div class="mb-4">
                        <label class="block text-gray-700" for="username-email">Username ou Email</label>
                        <input class="w-full p-2 border border-gray-300 rounded mt-1" id="username-email" type="text" />
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700" for="password-login">Senha</label>
                        <input class="w-full p-2 border border-gray-300 rounded mt-1" id="password-login" type="password" />
                    </div>
                    <button class="w-full bg-green-700 text-white p-2 rounded" type="submit">Login</button>
                    <p class="text-gray-600 text-sm mt-2">Aceito os termos da biblioteca</p>
                </form>
            </div>
        </div>
    </main>

    <script>
        document.getElementById('show-login').addEventListener('click', function() {
            document.getElementById('signup-screen').classList.add('hidden');
            document.getElementById('login-screen').classList.remove('hidden');
        });

        document.getElementById('show-signup').addEventListener('click', function() {
            document.getElementById('login-screen').classList.add('hidden');
            document.getElementById('signup-screen').classList.remove('hidden');
        });
    </script>
</body>

</html>
