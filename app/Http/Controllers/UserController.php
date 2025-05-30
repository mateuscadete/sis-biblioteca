<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{

    public function index() {
        $user = Auth::user();  // pega o usuário autenticado
    
        return view('layout.home', compact('user'));
    }
    public function login()
    {
        return view('users.login');
    }

    public function sobre()
    {
        return view('layout.sobre');
    }


    public function create()
    {
        // Carregar a VIEW
        return view('users.cadastro');
    }

    public function store(UserRequest $request)
    {
        // Validar o formulário
        $request->validated();

        // Cadastrar o usuário no BD
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Redirecionar o usuário, enviar a mensagem de sucesso
        return redirect()->route('user.index')->with('success', 'Usuário cadastrado com sucesso!');

    }

    public function ajuda()
    {
        return view('users.ajuda');

    }

    public function update(UserRequest $request, User $user)
    {

        // Validar o formulário
        $request->validated();

        // Editar as informações do registro no banco de dados
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);


        // Redirecionar o usuário, enviar a mensagem de sucesso
        return redirect()->route('user.show', ['user' => $user->id])->with('success', 'Usuário editado com sucesso!');

    }

    public function destroy(User $user)
    {

        // Apagar o registro no BD
        $user->delete();

        // Redirecionar o usuário, enviar a mensagem de sucesso
        return redirect()->route('user.index')->with('success', 'Usuário apagado com sucesso!');

    }

    // Processa a tentativa de login
    public function logar(LoginRequest $request)
    {
        // Validação dos dados enviados
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Tentativa de login do usuário
        if (Auth::attempt($request->only('email', 'password'))) {
            // Login bem-sucedido, redireciona para a página inicial (home)
            return redirect()->route('user.index')->with('success', 'Usuário logado com sucesso!'); // Certifique-se de ter a rota 'home' definida
        }

        // Se o login falhar, retorna com um erro
        return back()->withErrors([
            'email' => 'Credenciais inválidas.',
        ]);
    }

    public function acervo()
    {
        // Busca os livros para passar para a view
        $livros = \App\Models\Livro::all();

        // Retorna a view onde a lista de livros será mostrada (exemplo: 'acervo')
        return view('layout.acervo', compact('livros'));
    }
    //Logica da aba de pesquisa
    public function pesquisar(Request $request)
    {
        $termo = $request->input('termo');
    
        $usuarios = User::where('name', 'like', "%$termo%")
                        ->orWhere('email', 'like', "%$termo%")
                        ->get();
    
        return view('user.sobre', compact('usuarios'));
    }
    



}