<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('imagens/logo.png') }}" type="image/x-icon">
    <title>Meus Empréstimos</title>
</head>

<body>

    @include('includes.navbar')



    @section('content')
    <div class="container mt-4">
        <h1>Empréstimos</h1>


        <form method="GET" action="{{ route('emprestimos.index') }}" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Buscar por título, autor, status, etc." value="{{ request('search') }}">
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
                        @if ($livro && $livro->capa)
                        <img src="{{ asset('storage/' . $livro->capa) }}" alt="Capa" width="60">
                        @else
                        <span class="text-muted">Sem capa</span>
                        @endif
                    </td>
                    <td>{{ $livro->titulo ?? 'N/A' }}</td>
                    <td>{{ $livro->autor ?? 'N/A' }}</td>
                    <td>{{ $livro->editora ?? 'N/A' }}</td>
                    <td>{{ $livro->genero ?? 'N/A' }}</td>
                    <td>{{ $livro->edicao ?? 'N/A' }}</td>
                    <td>{{ $livro->paginas ?? 'N/A' }}</td>
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
                        <form action="{{ route('emprestimos.return', $emprestimo->id) }}" method="POST" onsubmit="return confirm('Confirmar devolução do livro?');">
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

    @include('includes.footer')


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const userMenuButton = document.getElementById('user-menu-button');
            const userDropdownContent = document.getElementById('user-dropdown-content');

            userMenuButton.addEventListener('click', function() {
                userDropdownContent.classList.toggle('show');
            });

            window.addEventListener('click', function(event) {
                if (!userMenuButton.contains(event.target) && !userDropdownContent.contains(event.target)) {
                    userDropdownContent.classList.remove('show');
                }
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.getElementById('mobile-menu');
            const navbarLinks = document.querySelector('.navbar-links');

            mobileMenuButton.addEventListener('click', function() {
                navbarLinks.classList.toggle('active');
            });
        });
    </script>
</body>

</html>