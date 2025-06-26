<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assistente de IA - Biblioteca</title>
    <link rel="icon" href="{{ asset('imagens/logo.png') }}" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/ia.css') }}">
</head>

<body>
    @include('includes.navbar')
    <header>
        <img src="{{ asset('imagens/ia1.png') }}" alt="IA" style="width: 100%; height: 100vh; object-fit: cover;">


        @guest
        @endguest


        <div class="titulo">
            <h1>A Inteligência Artificial em <br>nossa Biblioteca</h1>
        </div>
    </header>

    <main>

        <div class="chat-container">
            <h2>Assistente de IA da Plataforma EastBooks</h2>
            <p>Pergunte sobre livros, autores ou qualquer dúvida relacionada à nossa biblioteca.</p>

            <div class="chat-messages" id="chat-messages">
                <!-- Mensagens serão exibidas aqui -->
            </div>

            <div class="loading" id="loading">
                <p>Processando sua pergunta...</p>
            </div>

            <form id="chat-form">
                @csrf
                <input type="text" id="user-input" placeholder="Digite sua pergunta..." required>
                <button type="submit">Enviar</button>
            </form>

        </div>
    </main>

    @include('includes.footer')

    <script>
        document.getElementById('chat-form').addEventListener('submit', function(e) {
            e.preventDefault();

            const userInput = document.getElementById('user-input');
            const message = userInput.value.trim();

            if (message) {
                // Exibir mensagem do usuário
                displayMessage(message, 'user');

                // Mostrar indicador de carregamento
                document.getElementById('loading').style.display = 'block';

                // Limpar campo de entrada
                userInput.value = '';

                // Enviar para o servidor
                fetch('/api/ai-chat', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({
                            message: message
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        // Esconder indicador de carregamento
                        document.getElementById('loading').style.display = 'none';

                        // Exibir resposta da IA
                        if (data.response) {
                            displayMessage(data.response, 'ai');
                        } else {
                            displayMessage('Desculpe, ocorreu um erro ao processar sua solicitação.', 'ai');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        document.getElementById('loading').style.display = 'none';
                        displayMessage('Erro ao conectar com o serviço de IA.', 'ai');
                    });
            }
        });

        function displayMessage(message, sender) {
            const chatMessages = document.getElementById('chat-messages');
            const messageElement = document.createElement('div');
            messageElement.classList.add('message');
            messageElement.classList.add(sender === 'user' ? 'user-message' : 'ai-message');
            messageElement.textContent = message;
            chatMessages.appendChild(messageElement);

            // Rolagem automática para a última mensagem
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }
    </script>
</body>

</html>
