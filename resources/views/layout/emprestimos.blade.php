@section('content')
<div class="container">
    <!-- Inclui o arquivo de navbar1, que provavelmente contém a barra de navegação do sistema -->
    @include('includes.navbar1')

    <!-- Título principal da página -->
    <h1>Empréstimos Ativos</h1>

    <!-- Exibe o número de empréstimos ativos do usuário -->
    <p>Você possui {{ $emprestimos->count() }} empréstimos ativos.</p>

    <!-- Tabela que vai exibir os detalhes dos empréstimos ativos -->
    <table class="table">
        <thead>
            <tr>
                <!-- Coluna do título do livro -->
                <th>Livro</th>

                <!-- Se o usuário for administrador, exibe a coluna "Usuário" -->
                @if(auth()->user()->is_admin)
                    <th>Usuário</th>
                @endif

                <!-- Coluna da data do empréstimo -->
                <th>Data do Empréstimo</th>
                
                <!-- Coluna das ações, onde o botão de devolver será exibido -->
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <!-- Loop que percorre todos os empréstimos ativos -->
            @forelse($emprestimos as $emprestimo)
                <tr>
                    <!-- Exibe o título do livro associado ao empréstimo -->
                    <td>{{ $emprestimo->livro->titulo }}</td>

                    <!-- Se o usuário for administrador, exibe o nome do usuário que fez o empréstimo -->
                    @if(auth()->user()->is_admin)
                        <td>{{ $emprestimo->user->name }}</td>
                    @endif

                    <!-- Exibe a data do empréstimo formatada (d/m/Y H:i) -->
                    <td>{{ \Carbon\Carbon::parse($emprestimo->loan_date)->format('d/m/Y H:i') }}</td>
                    
                    <!-- Formulário para realizar a devolução do livro -->
                    <td>
                        <!-- A ação de devolução é um POST, que envia o ID do empréstimo para o endpoint de devolução -->
                        <form method="POST" action="{{ url('/emprestimos/' . $emprestimo->id . '/devolver') }}">
                            @csrf <!-- Token CSRF para segurança contra ataques -->
                            
                            <!-- Botão para devolver o livro, estilizado com Bootstrap -->
                            <button class="btn btn-warning btn-sm">Devolver</button>
                        </form>
                    </td>
                </tr>
            @empty
                <!-- Caso não haja empréstimos ativos, exibe uma linha com a mensagem "Nenhum empréstimo ativo" -->
                <tr><td colspan="4">Nenhum empréstimo ativo.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
