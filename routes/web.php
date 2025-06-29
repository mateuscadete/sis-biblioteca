<?php

use App\Http\Controllers\LivroController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\LoanController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\IAController;
use App\Http\Middleware\RedirectIfNotUsuario;


//Rota para a pagina home
Route::get('/', [UserController::class, 'index'])->name('user.index');

//Rotas para a pagina de login
Route::get('/login-user', [UserController::class, 'login'])->name('user.login');
Route::post('/login', [UserController::class, 'logar'])->name('login-user');

//Rota para a página de cadastro
Route::get('/create-user', [UserController::class, 'create'])->name('user.cadastro');
Route::post('/store-user', [UserController::class, 'store'])->name('user-store');

//Rota pra pagina ajuda
Route::get('/ajuda-user', [UserController::class, 'ajuda'])->name('user.ajuda');

//Rota para pagina sobre
Route::get('/sobre-layout', [UserController::class, 'sobre'])->name('layout.sobre');


// Rotas para o formulário de contato
Route::post('/contato', [ContatoController::class, 'submit'])->name('contato.submit');
Route::get('/contato', [ContatoController::class, 'index'])->name('contato.index');


//Rota Para pagina do livro
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [LivroController::class, 'index'])->name('dashboard');
});
Route::post('/livro', [LivroController::class, 'submit'])->name('livro.submit');
Route::delete('/livros/{livro}', [LivroController::class, 'destroy'])->name('livros.destroy');

//show livro
Route::get('/show-layout', [LivroController::class, 'show'])->name('layout.show');

// Mostrar formulário de edição
Route::get('editar-livro/{livro}', [LivroController::class, 'edit'])->name('layout.edit');

// Atualizar dados do livro
Route::put('/livros/{livro}', [LivroController::class, 'update'])->name('livros.update');

// Agrupa as rotas que precisam de autenticação do usuário para serem acessadas
Route::middleware(RedirectIfNotUsuario::class)->group(function () {
    
    // Rota GET para listar todos os empréstimos
    // Aponta para o método 'index' do LoanController
    // Nome da rota: 'emprestimos.index'
    Route::get('/emprestimos', [LoanController::class, 'listarEmprestimos'])->name('emprestimos.index');
    
    // Rota POST para realizar um novo empréstimo de livro
    // Aponta para o método 'loanBook' do LoanController
    // Nome da rota: 'emprestimos.store'
    Route::post('/emprestimos', [LoanController::class, 'loanBook'])->name('emprestimos.store');
    
    // Rota POST para registrar a devolução de um livro emprestado
    // Recebe o ID do empréstimo via parâmetro na URL
    // Aponta para o método 'returnBook' do LoanController
    // Nome da rota: 'emprestimos.return'
    Route::post('/emprestimos/{id}/devolver', [LoanController::class, 'returnBook'])->name('emprestimos.return');

    
});

// Rota para a página de acervo
Route::get('/acervo-layout', [UserController::class, 'acervo'])->name('layout.acervo');
//Rota aba de pesquisa
Route::get('/buscar-pagina', [App\Http\Controllers\BuscaController::class, 'redirecionar'])->name('buscar.pagina');

//Rota para logout
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate(); // invalida a sessão
    request()->session()->regenerateToken(); // regenera o token CSRF
    return redirect('/')->with('logout', 'Logout realizado com sucesso!');
})->name('logout');

//Rota para página individual do livro
Route::get('/livros/{id}', [LivroController::class, 'show'])->name('livros.show');
Route::post('/livros/{id}/emprestar', [App\Http\Controllers\LoanController::class, 'loanBook'])->middleware('auth')->name('livros.emprestar');

// Rota para filtrar livros e acervo
Route::get('/acervo-layout', [LivroController::class, 'filtro'])->name('layout.acervo');



/// Rota para a página de IA
Route::get('/assistente-ia', function () {
    return view('layout.ia');
})->middleware(RedirectIfNotUsuario::class)->name('assistente.ia'); 


// Rota para a API de chat com IA
Route::post('/api/ai-chat', [IAController::class, 'chat'])->name('ai.chat');





