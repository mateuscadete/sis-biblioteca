<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Login and Signup</title>
    <script src="https://cdn.tailwindcss.com"></script>
  
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
    <style>
       body {
    font-family: Arial, sans-serif;
    display: flex;
    flex-direction: column;
    align-items: center;
    height: 100vh;
    background-color: #f4f4f4;
    margin: 0;
}

.container {
    display: flex;
    max-width: 900px;
    width: 100%;
    background: white;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden;
    margin-top: 20px;
}

.welcome-section {
    flex: 1;
    background: #177232;
    color: white;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 40px;
    text-align: center;
}

.welcome-section h2 {
    margin-bottom: 10px;
    font-size: 24px;
}

.welcome-section button {
    background: white;
    color: #177232;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 4px;
    font-size: 16px;
    font-weight: bold;
}

.welcome-section button:hover {
    background: #e6e6e6;
}

.login-section {
    flex: 1;
    padding: 40px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background: white;
}

.login-box {
    width: 100%;
    max-width: 350px;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.login-box h2 {
    margin-bottom: 20px;
    font-size: 24px;
    color: #333;
    text-align: center;
}

.login-box input {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 14px;
}

.login-box button {
    width: 100%;
    background: #177232;
    color: white;
    border: none;
    padding: 10px;
    cursor: pointer;
    border-radius: 4px;
    font-size: 16px;
    font-weight: bold;
}

.login-box button:hover {
    background: #145a2f;
}

.terms {
    font-size: 12px;
    color: #666;
    margin-top: 10px;
    text-align: center;
}

@media (max-width: 768px) {
    .container {
        flex-direction: column;
    }
    .welcome-section, .login-section {
        flex: none;
        width: 100%;
        text-align: center;
    }
    .login-box {
        max-width: 100%;
        padding: 20px;
    }
}
    </style>
</head>
<body class="font-roboto bg-gray-100">
<header class="bg-gray-200 p-4 flex justify-between items-center">
    <div class="flex items-center">
        <img alt="Logo" class="mr-2" height="40" src="https://storage.googleapis.com/a1aa/image/9Uv1NNdH2k7r-d1gqDEHhwXor969oL3_oMiiPTjALYQ.jpg" width="40"/>
        <nav class="space-x-4">
            <a class="text-gray-700" href="home.blade.php">Home</a>
            <a class="text-gray-700" href="#">Sobre</a>
            <a class="text-gray-700" href="#">Categorias</a>
            <a class="text-gray-700" href="#">Blog</a>
            <a class="text-gray-700" href="#">Contato</a>
        </nav>
    </div>
    <div class="flex items-center space-x-4">
        <i class="fas fa-search text-gray-700"></i>
        <i class="fas fa-heart text-gray-700"></i>
        <i class="fas fa-user text-gray-700"></i>
    </div>
</header>


<main class="flex justify-center items-center min-h-screen">
 
 
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
                    <input class="w-full p-2 border border-gray-300 rounded mt-1" id="username-email" type="text"/>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700" for="password-login">Senha</label>
                    <input class="w-full p-2 border border-gray-300 rounded mt-1" id="password-login" type="password"/>
                </div>
                <button class="w-full bg-green-700 text-white p-2 rounded" type="submit">Login</button>
                <p class="text-gray-600 text-sm mt-2">Aceito os termos da biblioteca</p>
            </form>
        </div>
    </div>
</main>

<script>

    document.getElementById('show-signup').addEventListener('click', function() {
        document.getElementById('login-screen').classList.add('hidden');
        document.getElementById('signup-screen').classList.remove('hidden');
    });
</script>
</body>
</html>


