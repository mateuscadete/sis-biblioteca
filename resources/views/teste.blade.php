<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Biblioteca</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .btn-container {
            display: flex;
            justify-content: flex-end;
            padding: 10px 20px;
            background-color: #D8C3A5;
        }
        .btn {
            background-color: #fff;
            border: 1px solid #000;
            padding: 5px 10px;
            cursor: pointer;
            font-weight: bold;
            margin-left: 10px;
        }
        .btn:hover {
            background-color: #f0f0f0;
        }
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #D8C3A5;
            padding: 10px 20px;
            flex-wrap: wrap;
        }
        .logo .icon {
            font-size: 24px;
        }
        .nav-links {
            list-style: none;
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            padding: 0;
        }
        .nav-links li {
            display: inline;
        }
        .nav-links a {
            text-decoration: none;
            color: #000;
            font-weight: bold;
        }
        .nav-icons {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .search-box {
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .icon {
            font-size: 20px;
            cursor: pointer;
        }
        @media (max-width: 768px) {
            .btn-container {
                justify-content: center;
                padding: 10px;
            }
            .navbar {
                flex-direction: column;
                align-items: center;
            }
            .nav-links {
                flex-direction: column;
                align-items: center;
                gap: 10px;
            }
            .nav-icons {
                margin-top: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="btn-container">
        <button class="btn">Ajuda</button>
        <button class="btn">Login</button>
        <button class="btn">Cadastrar</button>
    </div>
    <nav class="navbar">
        <div class="logo">
            <span class="icon">&#128218;</span>
        </div>
        <ul class="nav-links">
            <li><a href="#">Home</a></li>
            <li><a href="#">Categorias</a></li>
            <li><a href="#">Sobre</a></li>
            <li><a href="#">Blog</a></li>
            <li><a href="#">Contato</a></li>
        </ul>
        <div class="nav-icons">
            <input type="text" placeholder="&#128269;" class="search-box">
            <span class="icon">&#10084;</span>
            <span class="icon">&#128214;</span>
        </div>
    </nav>
</body>
</html>
