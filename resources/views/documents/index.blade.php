@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Documentos</h1>
    <a href="{{ route('documents.create') }}" class="btn btn-primary mb-3">Adicionar Novo Documento</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Empresa</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($documents as $document)
            <tr>
                <td>{{ $document->id }}</td>
                <td>{{ $document->name }}</td>
                <td>{{ $document->description }}</td>
                <td>{{ $document->company->name }}</td>
                <td>
                    <a href="{{ route('documents.edit', $document->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('documents.destroy', $document->id) }}" method="POST" style="display: inline;">
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
