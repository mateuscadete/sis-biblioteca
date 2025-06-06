@extends('layout.app')

@section('content')
    <div class="container mt-4">
        <h1>Empréstimos</h1>

        @if ($overdueLoansCount > 0)
            <div class="alert alert-warning">
                Você tem {{ $overdueLoansCount }} livro(s) atrasado(s). Por favor, devolva-os o quanto antes.
            </div>
        @endif

        @if (Auth::user()->is_admin && $adminOverdueUsers->count() > 0)
            <div class="alert alert-info">
                Existem {{ $adminOverdueUsers->count() }} usuário(s) devendo livros.
            </div>
        @endif

        <form method="GET" action="{{ route('emprestimos.index') }}" class="mb-3">
            <select name="status" onchange="this.form.submit()">
                <option value="">Todos</option>
                <option value="atrasados" {{ request('status') == 'atrasados' ? 'selected' : '' }}>Atrasados</option>
                <option value="pendentes" {{ request('status') == 'pendentes' ? 'selected' : '' }}>Pendentes</option>
            </select>
            <div class="input-group">
                <input type="text" name="search" class="form-control"
                    placeholder="Buscar por título, autor, editora, etc." value="{{ request('search') }}">
                <button type="submit" class="btn btn-outline-secondary">Buscar</button>
                <a href="{{ route('emprestimos.index') }}" class="btn btn-outline-danger">Limpar</a>
            </div>
        </form>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Capa</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Editora</th>
                    <th>Gênero</th>
                    <th>Edição</th>
                    <th>Páginas</th>
                    <th>ISBN</th>
                    <th>Data</th>
                    <th>Descrição</th>
                    <th>Status</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($emprestimos as $emprestimo)
                    @php
                        $livro = $emprestimo->livro;
                    @endphp
                    <tr>
                        <td>

                            @if ($livro->imagem)
                                <img src="{{ asset('storage/' . $livro->imagem) }}" alt="Imagem do livro"
                                    style="max-width: 80px;">
                            @else
                                <span>Sem imagem</span>
                            @endif
                        </td>
                        <td>{{ $livro->titulo ?? 'N/A' }}</td>
                        <td>{{ $livro->autor ?? 'N/A' }}</td>
                        <td>{{ $livro->editora ?? 'N/A' }}</td>
                        <td>{{ $livro->genero ?? 'N/A' }}</td>
                        <td>{{ $livro->edicao ?? 'N/A' }}</td>
                        <td>{{ $livro->num_paginas ?? 'N/A' }}</td>
                        <td>{{ $livro->isbn ?? 'N/A' }}</td>
                        <td>{{ $livro->data ?? 'N/A' }}</td>
                        <td>{{ $livro->descricao ?? 'N/A' }}</td>
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
                        <td>
                            @if (!$emprestimo->return_date)
                                <form action="{{ route('emprestimos.return', $emprestimo->id) }}" method="POST"
                                    onsubmit="return confirm('Confirmar devolução do livro?');">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-primary">Devolver</button>
                                </form>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="12">Nenhum empréstimo encontrado</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
@endsection
