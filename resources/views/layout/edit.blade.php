<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Livro</title>
</head>
<body>

<h1>Editar Livro</h1>

@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('livros.update', $livro->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="titulo">Título:</label>
    <input type="text" name="titulo" value="{{ old('titulo', $livro->titulo) }}" required><br><br>

    <label for="autor">Autor:</label>
    <input type="text" name="autor" value="{{ old('autor', $livro->autor) }}" required><br><br>

    <label for="editora">Editora:</label>
    <input type="text" name="editora" value="{{ old('editora', $livro->editora) }}" required><br><br>

    <label for="genero">Gênero:</label>
    <input type="text" name="genero" value="{{ old('genero', $livro->genero) }}" required><br><br>

    <label for="tema">Tema:</label>
    <input type="text" name="tema" value="{{ old('tema', $livro->tema) }}" required><br><br>

    <label for="edicao">Edição:</label>
    <input type="text" name="edicao" value="{{ old('edicao', $livro->edicao) }}" required><br><br>

    <label for="num_paginas">Número de Páginas:</label>
    <input type="number" name="num_paginas" value="{{ old('num_paginas', $livro->num_paginas) }}" required><br><br>

    <label for="isbn">ISBN:</label>
    <input type="text" name="isbn" value="{{ old('isbn', $livro->isbn) }}" required><br><br>

    <label for="data">Data:</label>
    <input type="date" name="data" value="{{ old('data', \Carbon\Carbon::parse($livro->data)->format('Y-m-d')) }}"" required><br><br>

    <label for="qtde">Quantidade:</label>
    <input type="number" name="qtde" value="{{ old('qtde', $livro->qtde) }}" required><br><br>

    <label for="descricao">Descrição:</label>
    <textarea name="descricao" required>{{ old('descricao', $livro->descricao) }}</textarea><br><br>

    <button type="submit">Salvar</button>
    <a href="{{ route('layout.show') }}"><button type="button">Cancelar</button></a>
</form>

</body>
</html>
