@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Empresas</h1>
    <a href="{{ route('companies.create') }}" class="btn btn-primary mb-3">Adicionar Nova Empresa</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Endereço</th>
                <th>Telefone</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($companies as $company)
            <tr>
                <td>{{ $company->id }}</td>
                <td>{{ $company->name }}</td>
                <td>{{ $company->address }}</td>
                <td>{{ $company->phone }}</td>
                <td>
                    <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('companies.destroy', $company->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
