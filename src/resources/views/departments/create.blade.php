@extends('layouts.autenticado')
@section('main-content')

    <form action="{{ route('departments.store') }}" method="post">
        @csrf

        Nome: <input type="text" name="name" id="" class="form-control"><br>
        @error('name') <span class="text-danger">{{ $message }}</span><br>@enderror


        Código:
        <input type="text" name="code" id="" class="form-control"><br>
        @error('code') <span class="text-danger">{{ $message }}</span><br>@enderror

        <button type="submit" class="btn btn-success btn-lg">Guardar Modificações</button>
    </form>


@endsection
