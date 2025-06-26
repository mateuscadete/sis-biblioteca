<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('imagens/logo.png') }}" type="image/x-icon">
    <title>Meus Empréstimos</title>
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <link rel="stylesheet" href="{{ asset('css/emprestimo.css') }}">
    <script>
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('/sw.js')
                .then(reg => console.log('SW registrado:', reg))
                .catch(err => console.log('Erro ao registrar o SW:', err));
        }
    </script>
</head>

<body>
    @include('includes.navbar')

    <main>

        <section class="livros">

            <h2>Empréstimos</h2>

            @if ($overdueLoansCount > 0)
            <div class="message-box warning">
                Você tem {{ $overdueLoansCount }} livro(s) atrasado(s). Por favor, devolva-os o quanto antes.
            </div>
            @endif

            @if (Auth::user()->is_admin && $adminOverdueUsers->count() > 0)
            <div class="message-box info">
                Existem {{ $adminOverdueUsers->count() }} usuário(s) devendo livros.
            </div>
            @endif

            <form method="GET" action="{{ route('emprestimos.index') }}" class="form-filtro">
                <div class="filtros">
                    <select name="status" onchange="this.form.submit()" class="select-field">
                        <option value="">Todos</option>
                        <option value="atrasados" {{ request('status') == 'atrasados' ? 'selected' : '' }}>Atrasados</option>
                        <option value="pendentes" {{ request('status') == 'pendentes' ? 'selected' : '' }}>Pendentes</option>
                    </select>

                    <div class="pesquisa">
                        <input type="text" name="search" class="search-pesquisa"
                            placeholder="Buscar por título, autor, editora, etc." value="{{ request('search') }}">
                        <button type="submit" class="buscar">Buscar</button>
                        <a href="{{ route('emprestimos.index') }}" class="limpar">Limpar</a>
                    </div>

                </div>
            </form>

            <table class="tabela-emprestimos">
                <thead>
                    <tr>
                        <th scope="col">Capa</th>
                        <th scope="col">Título</th>
                        <th scope="col">Autor</th>
                        <th scope="col">Editora</th>
                        <th scope="col">Gênero</th>
                        <th scope="col">Edição</th>
                        <th scope="col">Páginas</th>
                        <th scope="col">ISBN</th>
                        <th scope="col">Data</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Status</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($emprestimos as $emprestimo)
                    @php
                    $livro = $emprestimo->livro;
                    @endphp
                    <tr>
                        <td data-label="Capa">
                            @if ($livro->imagem)
                            <img src="{{ asset('storage/' . $livro->imagem) }}" alt="Imagem do livro"
                                style="max-width: 80px;">
                            @else
                            <span>Sem imagem</span>
                            @endif
                        </td>
                        <td data-label="Título">{{ $livro->titulo ?? 'N/A' }}</td>
                        <td data-label="Autor">{{ $livro->autor ?? 'N/A' }}</td>
                        <td data-label="Editora">{{ $livro->editora ?? 'N/A' }}</td>
                        <td data-label="Gênero">{{ $livro->genero ?? 'N/A' }}</td>
                        <td data-label="Edição">{{ $livro->edicao ?? 'N/A' }}</td>
                        <td data-label="Páginas">{{ $livro->num_paginas ?? 'N/A' }}</td>
                        <td data-label="ISBN">{{ $livro->isbn ?? 'N/A' }}</td>
                        <td data-label="Data">{{ \Carbon\Carbon::parse($livro->data)->format('d/m/Y') }}</td>
                        <td data-label="Descrição">{{ $livro->descricao ?? 'N/A' }}</td>
                        <td data-label="Status">
                            @php
                            $loanDate = \Carbon\Carbon::parse($emprestimo->loan_date);
                            $now = \Carbon\Carbon::now();
                            $diffDays = $loanDate->diffInDays($now);
                            @endphp

                            @if ($emprestimo->return_date)
                            <span class="status-badge status-success">Devolvido</span>
                            @elseif ($diffDays > 7)
                            <span class="status-badge status-danger">Atrasado</span>
                            @else
                            <span class="status-badge status-warning">Pendente</span>
                            @endif
                        </td>
                        <td data-label="Ação">
                            @if (!$emprestimo->return_date)
                            <form action="{{ route('emprestimos.return', $emprestimo->id) }}" method="POST"
                                onsubmit="return confirm('Confirmar devolução do livro?');">
                                @csrf
                                <button type="submit" class="devolver">Devolver</button>
                            </form>
                            @else
                            <span class="text-muted-custom">-</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="12" class="no-records-found">Nenhum empréstimo encontrado</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

        </section>
    </main>

    @include('includes.footer')
</body>

</html>
