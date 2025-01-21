@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Adicionar Nova Empresa</h1>
    <form action="{{ route('companies.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nome da Empresa</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="address">Endereço</label>
            <input type="text" name="address" id="address" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="phone">Telefone</label>
            <input type="text" name="phone" id="phone" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</div>
@endsection
