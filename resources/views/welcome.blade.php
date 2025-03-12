<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Etec Zona Leste</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;

            color: white;
        }

        header{
            background-color: #33605a;
            height: 70%;
            width: 100%;
            position:absolute;
        }

.forms{
    list-style: none;
            display: flex;
            gap: 15px;
}
            .forms a{
            text-decoration: none;
            color: white;
            font-weight: bold;
}
        .navbar {

            display: inline block;
            border-radius: 10px;
            width: 80%;
            background: #e9e0d1;
            padding: 15px;
            position: absolute;
            left: 10%;
            top:   7%;

        }
        .links {
            list-style: none;
            display: flex;
            gap: 15px;
        }
        .links a {
            text-decoration: none;
            color: black;
            font-weight: bold;
        }


        .titulo {
            max-width: 50%;
            font-family: 'Roboto', sans-serif;
            font-size: 40px;
            padding-left: 10%;
            padding-top: 100px;
        }
        .btn {
            background: #808080;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        main{
            top:80%;
            left:10%;
            position: absolute;
        }



        .generos h2,h3  {
            color:rgb(70, 43, 22) ;
}

        .containergeneros {
            display: flex;
            gap: 25px;
            overflow-x: auto;
            left:30%;
            position: relative;
        }

        .cards{
            font-weight: bolder;
            color: white;

            padding: 15px;
            border-radius: 5px;
            box-shadow: 2px 2px 5px rgba(0,0,0,0.1);
            text-align: center;
            width: 150px;
            height: 150px;
        }

        .containerbooks{

            display: flex;
            flex-wrap: wrap;
            gap: 100px;
            justify-content: center;
            left:30%;
            position: relative;
        }

       .livros h2,h3 {
            color:rgb(70, 44, 24);
        }



        .book {
            background: white;
            color: black;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 2px 2px 5px rgba(0,0,0,0.1);
            text-align: center;
            width: 200px;
        }
        .book img {
            width: 100px;
            height: 150px;
        }
        .book button {
            margin-top: 10px;
            background: #808080;
            color: white;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        aside h2 {
            left:20%;
            position: relative;
        }
        .feedback{
            background-color:#e9e0d1;
            color:#68462b;
            padding: 10px;
            padding-top: 70px;
            border-radius: 5px;
            width: 100%;
            height: 50%;
            position: absolute ;
            top: 200%;}

        .containerfeed{
            display: flex;
            gap: 25px;
            overflow-x: auto;
            left:20%;
            position: relative;
        }

        .feed{
            background-color: white;
            font-weight: bolder;
            color:#68462b;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 2px 2px 5px rgba(0,0,0,0.1);
            text-align: center;
            width: 300px;
            height: 200px;
        }


        .footer {
            background-color: #2D4F47;
            color: white;
            padding: 40px;
            display: flex;
            justify-content: space-around;
            align-items: flex-start;
            position: absolute;
            top:300%;
            width: 100%;
        }
        .footer div {
            max-width: 250px;
        }
        .footer h3 {
            margin-bottom: 15px;
            font-size: 16px;
        }
        .footer p, .footer a {
            font-size: 14px;
            color: white;
            text-decoration: none;
            display: block;
            margin-bottom: 8px;
        }


    </style>
</head>
<body>
    <header>

    <ul class="forms">
        <li><a href="#">Ajuda</a></li>
        <li><a href="#">Login</a></li>
        <li><a href="#">Cadastrar</a></li>
    </ul>

        <nav class="navbar">

            <ul class="links">
                <li><a href="#">Home</a></li>
                <li><a href="#">Categorias</a></li>
                <li><a href="#">Sobre</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Contato</a></li>
            </ul>

        </nav>


            <div class="titulo">
                <h1>Bem-Vindo à<br> biblioteca<br>Etec Zona Leste</h1>
                <button class="btn">Cadastrar Livro</button>
            </div>


    </header>
    <main>

    <section class="generos">

    <h2>Gêneros</h2>
        <h3>Acesse algum gênero</h3>

        <div class="containergeneros">
            <div class="cards" style="background-color:#33605a;">Literatura Brasileira</div>
            <div class="cards" style="background-color: #68462b;">História</div>
            <div class="cards" style="background-color:#ccc591;">Economia</div>
            <div class="cards" style="background-color:#0a3740">Tecnologia</div>
            <div class="cards" style="background-color: #005bc5;">Ficção Científica</div>

        </div>
    </section>






    <section class="livros">

        <h2>Livros mais buscados</h2>
        <h3>Explore nossa biblioteca</h3>


        <div class="containerbooks">
            <div class="book">
                <img src="https://www.editoradodireito.com.br/media/catalog/product/9/7/9788536500317.154.png?optimize=low&bg-color=255,255,255&fit=bounds&height=1000&width=700&canvas=700:1000" alt="Livro 1">
                <h3>PHP 5: Conceitos e integração com banco de dados</h3>
                <p>Autor: Wallace Soares</p>
                <button>Comprar</button>
            </div>
            <div class="book">
                <img src="https://www.jurua.com.br/images/prod/s/22/22246.jpg?ts=20201205" alt="Livro 2">
                <h3>Contabilidade Geral</h3>
                <p>Autor: Anélio Berti</p>
                <button>Comprar</button>
            </div>
            <div class="book">
                <img src="https://www.editoradodireito.com.br/media/catalog/product/9/7/9788502618350.170.png?optimize=low&bg-color=255,255,255&fit=bounds&height=1000&width=700&canvas=700:1000" alt="Livro 3">
                <h3>Administração da Produção</h3>
                <p>Autor: Petrônio Martins & Fernando Laugeni</p>
                <button>Comprar</button>
            </div>
        </div>
        </section>
    </main>

    <aside class="feedback">
        <h2>Feedback dos nossos acadêmicos</h2>
        <div class="containerfeed">
        <div class="feed">
            <p>“A biblioteca da Etec Zona Leste é incrível! Sempre encontro o que procuro.”</p>
            <p>– João Silva</p>
        </div>

        <div class="feed">
            <p>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione officia illo excepturi aliquam aspernatur modi, aliquid quidem deserunt amet error architecto iste facere, ea voluptates temporibus esse vero dolore eveniet."</p>
        </div>

        <div class="feed">
            <p>"Lorem, ipsum dolor sit amet consectetur adipisicing elit. Id, veritatis nisi nemo beatae, aliquam cumque iusto fugit dolorem sequi velit, reiciendis esse? Incidunt autem fuga dolorem quos, et facilis asperiores"</p>
        </div>
        </div>
    </aside>

    <footer class="footer">
        <div>
            <img src="logo.png" alt="Logo">
            <p>Lorem ipsum dolor sit amet nulla adipiscing elit.</p>
            <p>info@mail.com</p>
            <p>+91 98765 43210</p>

        </div>
        <div>
            <h3>COMPANHIA</h3>
            <a href="#">Sobre</a>
            <a href="#">Criadores</a>
            <a href="#">Afiliados</a>
            <a href="#">Blog</a>
        </div>
        <div>
            <h3>BIBLIOTECA</h3>
            <a href="#">Funcionários</a>
            <a href="#">Etec</a>
            <a href="#">Livros</a>
            <a href="#">Como funciona</a>
        </div>
        <div>
            <h3>AJUDA</h3>
            <a href="#">Serviço e Atendimento</a>
            <a href="#">Minha Conta</a>
            <a href="#">Termos de Uso</a>
            <a href="#">Localização</a>
        </div>
    </footer>

</body>
</html>
