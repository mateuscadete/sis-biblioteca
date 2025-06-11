<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Editar Livro</title>
    <link rel="icon" href="{{ asset('imagens/logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/editlivro.css') }}">
</head>

<body style="background-image: url('{{ asset('imagens/editarlivro.jpg') }}'); object-fit: cover;">

    @include('includes.navbar')

    @if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('livros.update', $livro->id) }}" method="POST" enctype="multipart/form-data" class="form">
        @csrf
        @method('PUT')

        <div class="title">
            <h2>Editar Livro</h2>
        </div>

        <h3>1. Informações Principais</h3>

        <div class="input_container">
            <div class="input_box">
                <label for="titulo" class="form_label">Título</label>

                <div class="input_field">
                    <input class="form-control" type="text" name="titulo" id="titulo" placeholder="Ex: Nome do Livro" value="{{ old('titulo', $livro->titulo) }}" required>

                </div>
            </div>

            <div class="input_box">
                <label for="editora" class="form_label">Gênero</label>
                <div class="input_field">
                    <input class="form-control" type="text" name="genero" id="genero" placeholder="Ex:Romance, Informativo" value="{{ old('genero', $livro->genero) }}" required>
                </div>
            </div>

            <div class="input_box">
                <label for="editora" class="form_label">Editora</label>
                <div class="input_field">
                    <input class="form-control" type="text" name="editora" id="editora" placeholder="Ex: Arqueiro, Saraiva" value="{{ old('editora', $livro->editora) }}" required>
                </div>
            </div>

            <div class="input_box">
                <label for="tema" class="form_label">Tema</label>

                <div class="input_field">
                    <input class="form-control" type="text" name="tema" id="tema" placeholder="Ex: Tecnologia, Economia" value="{{ old('tema', $livro->tema) }}" required>
                </div>
            </div>

            <div class="input_box">
                <label for="autor" class="form_label">Autor(a)</label>
                <div class="input_field">
                    <input class="form-control" type="text" name="autor" id="autor" placeholder="Nome do Autor(a)" value="{{ old('autor', $livro->autor) }}" required>
                </div>
            </div>


            <div class="input_box">
                <label for="edicao" class="form_label">Edição</label>
                <div class="input_field">
                    <input class="form-control" type="text" name="edicao" id="edicao" placeholder="Ex: 1ª edição" value="{{ old('edicao', $livro->edicao) }}" required>
                </div>
            </div>

            <div class="input_box">
                <label for="imagem" class="form_label">Imagem da capa:</label>
                <div class="input_field">
                    <input class="form-control" type="file" name="imagem" id="imagem" accept="image/*">
                </div>

            </div>
        </div>

        <h3>2. Informações Adicionais</h3>

        <div class="input_container">

            <div class="input_box">
                <label for="paginas" class="form_label">Número de Páginas</label>
                <div class="input_field">
                    <input class="form-control" type="number" name="num_paginas" id="num_paginas" value="{{ old('num_paginas', $livro->num_paginas) }}" required>
                </div>
            </div>

            <div class="input_box">
                <label for="isbn" class="form_label">ISBN</label>
                <div class="input_field">
                    <input class="form-control" type="text" name="isbn" id="isbn" placeholder="Ex: 978-85-7522-000-0" value="{{ old('isbn', $livro->isbn) }}" required>
                </div>
            </div>

            <div class="input_box">
                <label for="data" class="form_label">Data de Publicação</label>
                <div class="input_field">
                    <input class="form-control" type="date" name="data" id="data"
                        value="{{ old('data', \Carbon\Carbon::parse($livro->data)->format('Y-m-d')) }}" required>
                </div>
            </div>

            <div class="input_box">
                <label for="qtde" class="form_label">Quantidade:</label>
                <div class="input_field">
                    <input class="form-control" type="number" name="qtde" id="qtde" value="{{ old('qtde', $livro->qtde) }}" required>
                </div>
            </div>

            <div class="input_box">
                <label for="descricao" class="form_label">Descrição:</label>
                <div class="input_field">
                    <input class="form-control" type="text" name="descricao" id="descricao" value="{{ old('descricao', $livro->descricao) }}" required>
                </div>
            </div>



        </div>
        <div class="botoes-container">
            <button type="submit" class="salvar">Salvar</button>
            <a href="{{ route('layout.show') }}">
                <button type="button" class="cancelar">Cancelar</button>
            </a>
        </div>
    </form>

</body>

</html>
