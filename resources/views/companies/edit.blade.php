@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Empresa</h1>
    <form action="{{ route('companies.update', $company->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nome da Empresa</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $company->name }}" required>
        </div>
        <div class="form-group">
            <label for="address">Endereço</label>
            <input type="text" name="address" id="address" class="form-control" value="{{ $company->address }}" required>
        </div>
        <div class="form-group">
            <label for="phone">Telefone</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ $company->phone }}" required>
        </div>
        <button type="submit" class="btn btn-success">Atualizar</button>
    </form>
</div>
@endsection
