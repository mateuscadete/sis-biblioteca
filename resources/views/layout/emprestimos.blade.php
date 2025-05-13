@section('content')
<div class="container">
    @include('includes.navbar1')

    <h1>Empréstimos Ativos</h1>

    <p>Você possui {{ $emprestimos->count() }} empréstimos ativos.</p>
    <table class="table">
        <thead>
            <tr>
                <th>Livro</th>
                @if(auth()->user()->is_admin)
                    <th>Usuário</th>
                @endif
                <th>Data do Empréstimo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($emprestimos as $emprestimo)
                <tr>
                    <td>{{ $emprestimo->livro->titulo }}</td>
                    @if(auth()->user()->is_admin)
                        <td>{{ $emprestimo->user->name }}</td>
                    @endif
                    <td>{{ \Carbon\Carbon::parse($emprestimo->loan_date)->format('d/m/Y H:i') }}</td>
                    <td>
                        <form method="POST" action="{{ url('/emprestimos/' . $emprestimo->id . '/devolver') }}">
                            @csrf
                            <button class="btn btn-warning btn-sm">Devolver</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4">Nenhum empréstimo ativo.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection