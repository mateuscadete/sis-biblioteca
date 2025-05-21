<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/navbar1.css') }}">
    <link rel="stylesheet" href="{{ asset('css/acervo.css') }}">
</head>

<body>
    @include ('includes.navbar1')

    <main id="form_container">
        <div id="form_header">
            <h1 id="form_title">Cadastrar Livro</h1>
        </div>

        <form action="" id="form">
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




                <div class="input_box">
                    <label for="data" class="form_label">Data de Publicação</label>

                    <div class="input_field">
                        <input class="form-control" type="date" id="data">

                    </div>
                </div>


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


        </form>

    </main>

</body>

</html>
