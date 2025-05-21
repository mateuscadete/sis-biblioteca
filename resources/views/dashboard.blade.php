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




    <form action="{{ route('livro.submit') }}" method="POST" enctype="multipart/form-data">

        @csrf

        <h1>Cadastrar Novo Livro</h1>

        <h3>1. Informações Principais</h3>

        <div id="input_container">
            <div class="input_box">
                <label for="titulo" class="form_label">Título</label>

                <div class="input_field">
                    <input class="form-control" type="text" id="titulo" placeholder="Nome do Livro">
                </div>
            </div>

            <div class="input_box">
                <label for="editora" class="form_label">Gênero</label>
                <div class="input_field">
                    <input class="form-control" type="text" id="genero" placeholder="Ex:Romance, Informativo">
                </div>
            </div>


            <div class="input_box">
                <label for="editora" class="form_label">Editora</label>
                <div class="input_field">
                    <input class="form-control" type="text" id="editora" placeholder="Ex: Arqueiro, Saraiva">
                </div>
            </div>

            <div class="input_box">
                <label for="tema" class="form_label">Tema</label>

                <div class="input_field">
                    <input class="form-control" type="text" id="tema" placeholder="Ex: Tecnologia, Economia">
                </div>
            </div>

            <div class="input_box">
                <label for="autor" class="form_label">Autor(a)</label>

                <div class="input_field">
                    <input class="form-control" type="text" id="autor" placeholder="Nome do Autor(a)">
                </div>
            </div>

            <h3>2. Informações Adicionais</h3>

            <div class="input_box">
                <label for="paginas" class="form_label">Número de Páginas</label>

                <div class="input_field">
                    <input type="number" class="form-control" id="paginas"></input>
                </div>
            </div>

            <div class="input_box">
                <label for="isbn" class="form_label">ISBN</label>

                <div class="input_field">
                    <input class="form-control" type="text" id="isbn" placeholder="Ex: 978-85-7522-000-0">
                </div>

                <div class="input_box">
                    <label for="data" class="form_label">Data de Publicação</label>

                    <div class="input_field">
                        <input class="form-control" type="date" id="data">

                    </div>
                </div>

                <h3>3. Informações para a Biblioteca</h3>

                <div class="input_box">
                    <label for="id-livro" class="form_label">Id(caso haja mais de um)</label>

                    <div class="input_field">
                        <input class="form-control" type="number" id="id-livro">
                    </div>
                </div>

                <div class="radio-container">
                    <label class="form_label">Uso do Livro</label>
                    <div class="radio-box">
                        <input type="radio" id="local" value="local" class="form_control">
                        <label class="form-label" for="local">Local</label>
                    </div>

                    <div class="radio-box">
                        <input type="radio" id="emprestimo" value="emprestimo" class="form_control">
                        <label class="form-label" for="emprestimo">Empréstimo</label>
                    </div>
                </div>



                <button type="submit" class="cadastrar">Cadastrar</button>

            </div>
    </form>



</body>

</html>