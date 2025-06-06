<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="{{ asset('imagens/logo.png') }}" type="image/x-icon" />
    <title>Contato</title>
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/contato.css') }}" />
</head>

<body>
    @include('includes.navbar')

    <div class="container">
        <div class="left" style="background-image: url('imagens/contato.jpg'); object-fit: cover; width: 100%; height: 100%;">

            <h2>Entre em Contato<br> com a EastBooks</h2>
        </div>

        <div class="right">
            <h2>Preencha as informações</h2>
            <form id="contatoForm" class="contato" aria-label="Formulário de Contato">
                <label for="nome">Nome:</label>
                <input type="text" class="name" id="nome" name="nome" required aria-required="true" />

                <label for="email">E-mail:</label>
                <input type="email" class="email" id="email" name="email" required aria-required="true" />

                <label for="assunto">Assunto:</label>
                <textarea id="assunto" class="assunto" name="assunto" rows="5" required aria-required="true"></textarea>

                <button class="enviar" type="submit">Enviar</button>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('contatoForm').addEventListener('submit', function(event) {
            event.preventDefault(); // evita envio para o backend

            // Pega os valores do formulário
            const nome = document.getElementById('nome').value;
            const email = document.getElementById('email').value;
            const assunto = document.getElementById('assunto').value;

            // Cria o corpo do e-mail (codificando apenas a mensagem)
            const body = encodeURIComponent(
                `Nome: ${nome}\nE-mail: ${email}\n\nMensagem:\n${assunto}`
            );

            // Define seu e-mail que receberá a mensagem
            const destinatario = 'mateus_cadete@outlook.com'; // e-mail do destinatário

            // Monta o link mailto (sem codificar o email do destinatário)
            const mailtoLink = `mailto:${destinatario}?subject=Contato do site&body=${body}`;

            // Abre o cliente de e-mail do usuário
            window.location.href = mailtoLink;
        });
    </script>
</body>

</html>
