<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Livro</title>
</head>
<body>

<h1>Cadastrar Novo Livro</h1>

<form action="{{ route('livro.submit') }}" method="POST">
    @csrf
    <label for="Tema">Tema:</label>
    <input type="text" name="Tema" id="Tema" required><br><br>

    <label for="Autor">Autor:</label>
    <input type="text" name="Autor" id="Autor" required><br><br>

    <label for="Titulo">Título:</label>
    <input type="text" name="Titulo" id="Titulo" required><br><br>

    <label for="ISBN">ISBN:</label>
    <input type="text" name="ISBN" id="ISBN" required><br><br>

    <label for="num_pagina">Número de Páginas:</label>
    <input type="number" name="num_pagina" id="num_pagina" required><br><br>

    <label for="edicao">Edição:</label>
    <input type="text" name="edicao" id="edicao" required><br><br>

    <label for="data">Data:</label>
    <input type="date" name="data" id="data" required><br><br>

    <label for="Editora">Editora:</label>
    <input type="text" name="Editora" id="Editora" required><br><br>

    <label for="Genero">Gênero:</label>
    <input type="text" name="Genero" id="Genero" required><br><br>

    <button type="submit">Salvar</button>
</form>

</body>
</html>
