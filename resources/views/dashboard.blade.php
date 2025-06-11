<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Livro</title>
    <link rel="icon" href="{{ asset('imagens/logo.png') }}" type="image/x-icon">

    <link rel="stylesheet" href="{{ asset('css/cadastrolivro.css') }}">

</head>



<body style="background-image: url('{{ asset('imagens/cadastrolivro.jpg') }}'); object-fit: cover;">

    @include('includes.navbar')
    <form class="form" action="{{ route('livro.submit') }}" method="POST" enctype="multipart/form-data">


        <form action="{{ route('livro.submit') }}" method="POST" enctype="multipart/form-data">


            @csrf
            <div class="title">
                <h2>Cadastrar Livro</h2>
            </div>


            <h3>1. Informações Principais</h3>

            <div class="input_container">
                <div class="input_box">
                    <label for="titulo" class="form_label">Título</label>

                    <div class="input_field">
                        <input class="form-control" type="text" name="titulo" id="titulo" placeholder="Ex: Nome do Livro" required>

                    </div>
                </div>

                <div class="input_box">
                    <label for="editora" class="form_label">Gênero</label>
                    <div class="input_field">
                        <input class="form-control" type="text" name="genero" id="genero" placeholder="Ex:Romance, Informativo" required>
                    </div>
                </div>


                <div class="input_box">
                    <label for="editora" class="form_label">Editora</label>
                    <div class="input_field">
                        <input class="form-control" type="text" name="editora" id="editora" placeholder="Ex: Arqueiro, Saraiva" required>
                    </div>
                </div>

                <div class="input_box">
                    <label for="tema" class="form_label">Tema</label>

                    <div class="input_field">
                        <input class="form-control" type="text" name="tema" id="tema" placeholder="Ex: Tecnologia, Economia" required>
                    </div>
                </div>

                <div class="input_box">
                    <label for="autor" class="form_label">Autor(a)</label>
                    <div class="input_field">
                        <input class="form-control" type="text" name="autor" id="autor" placeholder="Nome do Autor(a)" required>
                    </div>
                </div>

                <div class="input_box">
                    <label for="edicao" class="form_label">Edição</label>
                    <div class="input_field">
                        <input class="form-control" type="text" name="edicao" id="edicao" placeholder="Ex: 1ª edição" required>
                    </div>
                </div>

                <div class="input_box">
                    <label for="imagem" class="form_label">Imagem da capa:</label>
                    <div class="input_field">
                        <input class="form-control" type="file" name="imagem" id="imagem" accept="image/*" required>
                    </div>

                </div>

            </div>


            <h3>2. Informações Adicionais</h3>

            <div class="input_container">

                <div class="input_box">
                    <label for="paginas" class="form_label">Número de Páginas</label>
                    <div class="input_field">
                        <input class="form-control" type="number" name="num_paginas" id="num_paginas" required>
                    </div>
                </div>

                <div class="input_box">
                    <label for="isbn" class="form_label">ISBN</label>
                    <div class="input_field">
                        <input class="form-control" type="text" name="isbn" id="isbn" placeholder="Ex: 978-85-7522-000-0" required>
                    </div>
                </div>



                <div class="input_box">
                    <label for="data" class="form_label">Data de Publicação</label>
                    <div class="input_field">
                        <input class="form-control" type="date" name="data" id="data" required>
                    </div>
                </div>


                <div class="input_box">
                    <label for="qtde" class="form_label">Quantidade:</label>
                    <div class="input_field">
                        <input class="form-control" type="number" name="qtde" id="qtde" required>
                    </div>
                </div>



                <div class="input_box">
                    <label for="descricao" class="form_label">Descrição:</label>
                    <div class="input_field">
                        <input class="form-control" type="text" name="descricao" id="descricao" required>
                    </div>
                </div>


            </div>




            <button type="submit" class="cadastrar">Cadastrar</button>


        </form>



</body>

</html>
