@extends('layout.home')

@section('content')
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    padding: 0;
}

.container {
    margin-top: 20px;
    padding: 20px;
    background: #ffffff;
    border-radius: 8px;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
}

.card {
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    padding: 20px;
    max-width: 600px;
    margin: 40px auto;
}

.card-header {
    background-color: #007bff;
    color: #ffffff;
    font-weight: bold;
    padding: 15px;
    border-radius: 8px 8px 0 0;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.card-header a, .card-header button {
    color: #ffffff;
    text-decoration: none;
    font-size: 14px;
}

.card-body {
    padding: 20px;
}

dl {
    margin: 0;
}

dt {
    font-weight: bold;
    color: #333;
}

dd {
    margin-bottom: 10px;
    color: #555;
}

.btn-sm {
    padding: 8px 12px;
    font-size: 0.875rem;
    border-radius: 5px;
}

.btn-info {
    background-color: #17a2b8;
    border-color: #17a2b8;
}

.btn-warning {
    background-color: #ffc107;
    border-color: #ffc107;
}

.btn-danger {
    background-color: #dc3545 !important;
    border-color: #dc3545 !important;
}

.btn-danger:hover {
    background-color: #c82333 !important;
    border-color: #bd2130 !important;
}

@media (max-width: 768px) {
    .card {
        width: 90%;
        margin: auto;
    }
    
    .card-header {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .card-header span.ms-auto {
        margin-top: 10px;
    }
}
</style>
    <div class="card mt-4 mb-4 border-light shadow">

        <div class="card-header hstack gap-2">
            <span>Visualizar Usuário</span>

            <span class="ms-auto d-sm-flex flex-row">

                <a href="{{ route('user.index') }}" class="btn btn-info btn-sm me-1">Listar</a>
                <a href="{{ route('user.edit', ['user' => $user->id]) }}" class="btn btn-warning btn-sm me-1">Editar</a>
                <form method="POST" action="{{ route('user.destroy', ['user' => $user->id]) }}">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger btn-sm me-1"
                        onclick="return confirm('Tem certeza que deseja apagar este registro?')">Apagar</button>
                </form>
            </span>
        </div>

        <div class="card-body">

            <x-alert />

            <dl class="row">

                <dt class="col-sm-3">ID</dt>
                <dd class="col-sm-9">{{ $user->id }}</dd>

                <dt class="col-sm-3">Nome</dt>
                <dd class="col-sm-9">{{ $user->name }}</dd>

                <dt class="col-sm-3">E-mail</dt>
                <dd class="col-sm-9">{{ $user->email }}</dd>

                <dt class="col-sm-3">Cadastrado</dt>
                <dd class="col-sm-9">{{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y H:i:s') }}</dd>

                <dt class="col-sm-3">Editado</dt>
                <dd class="col-sm-9">{{ \Carbon\Carbon::parse($user->updated_at)->format('d/m/Y H:i:s') }}</dd>

            </dl>
        </div>
    </div>
@endsection