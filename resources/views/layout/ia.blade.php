<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assistente de IA - Biblioteca</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .chat-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
        }

        .chat-messages {
            height: 400px;
            overflow-y: auto;
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #eee;
            border-radius: 4px;
            background-color: white;
        }

        .message {
            margin-bottom: 10px;
            padding: 8px 12px;
            border-radius: 4px;
        }

        .user-message {
            background-color: #e3f2fd;
            text-align: right;
        }

        .ai-message {
            background-color: #f5f5f5;
            text-align: left;
        }

        #chat-form {
            display: flex;
            gap: 10px;
        }

        #user-input {
            flex-grow: 1;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .loading {
            display: none;
            text-align: center;
            color: #666;
        }
    </style>
</head>

<body>
    <div class="chat-container">
        <h2>Assistente de IA da Biblioteca</h2>
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