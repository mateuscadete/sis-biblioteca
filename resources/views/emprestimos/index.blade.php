@extends('layout.app')

@section('content')
    <div class="container mt-4">
        <h1>Empréstimos</h1>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Livro</th>
                    <th>Usuário</th>
                    <th>Data do Empréstimo</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($emprestimos as $emprestimo)
                    <tr>
                        <td>{{ $emprestimo->livro->titulo ?? 'N/A' }}</td>
                        <td>{{ $emprestimo->user->name ?? 'Você' }}</td>
                        <td>{{ \Carbon\Carbon::parse($emprestimo->loan_date)->format('d/m/Y H:i') }}</td>
                        <td>
                            @php
                                $loanDate = \Carbon\Carbon::parse($emprestimo->loan_date);
                                $now = \Carbon\Carbon::now();
                                $diffDays = $loanDate->diffInDays($now);
                            @endphp

                            @if ($emprestimo->return_date)
                                <span class="badge bg-success">Devolvido</span>
                            @elseif ($diffDays > 7)
                                <span class="badge bg-danger">Atrasado</span>
                            @else
                                <span class="badge bg-warning text-dark">Pendente</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4">Nenhum empréstimo encontrado</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
