# 📖 Sistema para Bibliotecas

![GitHub license](https://img.shields.io/github/license/mateuscadete/sis-biblioteca?style=flat-square)
![GitHub last commit](https://img.shields.io/github/last-commit/mateuscadete/sis-biblioteca?style=flat-square)
![GitHub repo size](https://img.shields.io/github/repo-size/mateuscadete/sis-biblioteca?style=flat-square)

Este repositório contém o projeto de **Trabalho de Conclusão de Curso (TCC)** desenvolvido na **Etec Zona Leste** no 1º semestre de 2025.

O sistema digital para bibliotecas facilita o **empréstimo** e a **devolução de livros**, melhora a organização do acervo e envia **notificações automáticas** aos usuários. O objetivo é agilizar o atendimento e reduzir o trabalho manual dos funcionários, tornando o acesso aos livros mais rápido e eficiente para alunos, professores e equipe.

---

## 🛠️ Tecnologias Utilizadas

![Laravel](https://img.shields.io/badge/Laravel-F72C1F?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-00758F?style=for-the-badge&logo=mysql&logoColor=white)
![Jetstream](https://img.shields.io/badge/Jetstream-2F855A?style=for-the-badge&logo=laravel&logoColor=white)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)
![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)
![Vite](https://img.shields.io/badge/Vite-646CFF?style=for-the-badge&logo=vite&logoColor=white)
![PWA](https://img.shields.io/badge/PWA-5A0FC8?style=for-the-badge&logo=pwa&logoColor=white)
![Gemini](https://img.shields.io/badge/Gemini-4285F4?style=for-the-badge&logo=google&logoColor=white)
---

## 🚀 Como rodar o projeto localmente

### ✅ Pré-requisitos

- PHP 8.x instalado  
- Composer  
- Node.js e npm  
- MySQL (ou outro compatível)

---

### 📦 Passos para configurar

```bash
# Clone o repositório
git clone https://github.com/mateuscadete/sis-biblioteca.git
cd sistema-bibliotecas

# Instale as dependências PHP
composer install

# Copie o arquivo de configuração de ambiente
cp .env.example .env

# Gere a chave da aplicação Laravel
php artisan key:generate
````

1. Configure o banco de dados e outras variáveis no arquivo `.env`.

```bash
# Execute as migrations
php artisan migrate

# Instale Laravel Jetstream (caso necessário)
composer require laravel/jetstream

# Instale dependências do frontend
npm install

# Compile os assets com Vite
npm run build

# Crie o link simbólico para armazenamento
php artisan storage:link

# Inicie o servidor local
php artisan serve
```

Acesse o sistema: [http://localhost:8000](http://localhost:8000)

---

## 💡 Funcionalidades

* ✅ Login e cadastro com autenticação
* ✅ Diferenciação entre usuários comuns e administradores
* ✅ Cadastro, edição e remoção de livros (admin)
* ✅ Registro de empréstimos e devoluções
* ✅ Notificações automáticas para livros atrasados
* ✅ Upload de imagem para os livros

---

## 🧪 Testes

Para executar os testes (se houver):

```bash
php artisan test
```

---

## 🤝 Contribuição

Contribuições são bem-vindas!

1. Faça um fork
2. Crie uma branch: `git checkout -b minha-feature`
3. Commit: `git commit -m 'Minha nova feature'`
4. Push: `git push origin minha-feature`
5. Crie um Pull Request

---

## 📄 Licença

Este projeto está licenciado sob os termos da licença MIT.
Veja o arquivo [LICENSE](./LICENSE) para mais detalhes.

---

## ✉️ Contato

Caso queira entrar em contato com os desenvolvedores do projeto:

- 👤 **Mateus Cadete**  
  [![GitHub](https://img.shields.io/badge/GitHub-mateuscadete-181717?style=flat-square&logo=github)](https://github.com/mateuscadete)  
  📧 mateus_cadete@outlook.com

- 👤 **Joel Quia**  
  [![GitHub](https://img.shields.io/badge/GitHub-JoelQuia-181717?style=flat-square&logo=github)](https://github.com/JoelQuia)

- 👤 **Gabriel**  
  [![GitHub](https://img.shields.io/badge/GitHub-Gabriel5454-181717?style=flat-square&logo=github)](https://github.com/Gabriel5454)
```
