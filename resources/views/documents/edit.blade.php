@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Documento</h1>
    <form action="{{ route('documents.update', $document->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nome do Documento</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $document->name }}" required>
        </div>
        <div class="form-group">
            <label for="description">Descrição</label>
            <textarea name="description" id="description" class="form-control">{{ $document->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="file_path">Arquivo (deixe vazio para manter o atual)</label>
            <input type="file" name="file_path" id="file_path" class="form-control">
        </div>
        <div class="form-group">
            <label for="company_id">Empresa</label>
            <select name="company_id" id="company_id" class="form-control" required>
                @foreach($companies as $company)
                <option value="{{ $company->id }}" {{ $company->id == $document->company_id ? 'selected' : '' }}>
                    {{ $company->name }}
                </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Atualizar</button>
    </form>
</div>
@endsection
