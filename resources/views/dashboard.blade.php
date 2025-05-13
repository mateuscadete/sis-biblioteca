<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Livro</title>
    <link rel="stylesheet" href="{{ asset('css/navbar1.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cadastrolivro.css') }}">
</head>
<body>

<h1>Cadastrar Novo Livro</h1>
<form action="{{ route('livro.submit') }}" method="POST" enctype="multipart/form-data">

    @csrf

    <label for="tema">Tema:</label>
    <input type="text" name="tema" id="tema" required><br><br>

    <label for="autor">Autor:</label>
    <input type="text" name="autor" id="autor" required><br><br>

    <label for="titulo">Título:</label>
    <input type="text" name="titulo" id="titulo" required><br><br>

    <label for="isbn">ISBN:</label>
    <input type="text" name="isbn" id="isbn" required><br><br>

    <label for="num_paginas">Número de Páginas:</label>
    <input type="number" name="num_paginas" id="num_paginas" required><br><br>

    <label for="edicao">Edição:</label>
    <input type="text" name="edicao" id="edicao" required><br><br>

    <label for="data">Data:</label>
    <input type="date" name="data" id="data" required><br><br>

    <label for="editora">Editora:</label>
    <input type="text" name="editora" id="editora" required><br><br>

    <label for="genero">Gênero:</label>
    <input type="text" name="genero" id="genero" required><br><br>

    <label for="descricao">Descrição:</label>
    <input type="text" name="descricao" id="descricao" required><br><br>

    <label for="qtde">Quantidade:</label>
    <input type="number" name="qtde" id="qtde" required><br><br>

    <label for="imagem">Imagem da capa:</label>
    <input type="file" name="imagem" id="imagem" accept="image/*" required><br><br>

    <button type="submit">Cadastrar</button>
</form>

</body>
</html>
