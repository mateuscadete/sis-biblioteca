# 📖 Sistema para Bibliotecas

Este repositório contém as versões do Trabalho de Conclusão de Curso desenvolvido na Etec Zona Leste no 1º semestre de 2025. O projeto é um sistema para gerenciamento de bibliotecas.

Este sistema digital para bibliotecas facilita o empréstimo e a devolução de livros, melhora a organização do acervo e envia notificações automáticas aos usuários. O objetivo é agilizar o atendimento e reduzir o trabalho manual dos funcionários, tornando o acesso aos livros mais rápido e eficiente para alunos, professores e equipe.

## 🚀 Como rodar o projeto localmente

### Pré-requisitos

* PHP 8.x instalado
* Composer instalado
* Node.js e npm instalados
* Banco de dados MySQL (ou outro compatível configurado)

---

### Passos para configurar

1. Clone o repositório:

   ```bash
   git clone https://github.com/seu-usuario/seu-repositorio.git
   cd seu-repositorio
   ```

2. Instale as dependências PHP:

   ```bash
   composer install
   ```

3. Copie o arquivo de configuração do ambiente:

   ```bash
   copy .env.example .env
   ```

4. Gere a chave da aplicação Laravel:

   ```bash
   php artisan key:generate
   ```

5. Configure as variáveis do arquivo `.env` (como conexão com banco de dados)

6. Execute as migrations para criar as tabelas no banco:

   ```bash
   php artisan migrate
   ```

7. Instale o Laravel Jetstream (caso ainda não esteja instalado):

   ```bash
   composer require laravel/jetstream
   ```

8. Instale as dependências do frontend:

   ```bash
   npm install
   ```

9. Compile os assets:

   ```bash
   npm run build
   ```

10. Crie o link simbólico para a pasta de armazenamento (upload de arquivos):

    ```bash
    php artisan storage:link
    ```

11. Inicie o servidor local:

    ```bash
    php artisan serve
    ```

12. Acesse o sistema pelo navegador em [http://localhost:8000](http://localhost:8000)

---

## 📋 Observações

* Lembre-se de configurar corretamente o banco de dados no arquivo `.env`.
* Para rodar testes (se houver), utilize:

  ```bash
  php artisan test
  ```

---
