@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Adicionar Novo Documento</h1>
    <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Nome do Documento</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Descrição</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="file_path">Arquivo</label>
            <input type="file" name="file_path" id="file_path" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="company_id">Empresa</label>
            <select name="company_id" id="company_id" class="form-control" required>
                @foreach($companies as $company)
                <option value="{{ $company->id }}">{{ $company->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</div>
@endsection
