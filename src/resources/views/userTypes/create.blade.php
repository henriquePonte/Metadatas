@extends('layouts.autenticado')

@section('main-content')
    <form action="{{ route('userTypes.store') }}" method="post">
        @csrf

        <label for="user_type_permition">Type:</label>
        <input type="text" name="user_type_permition" id="user_type_permition" class="form-control">
        @error('user_type_permition') <span class="text-danger">{{ $message }}</span><br>@enderror

        <button type="submit" class="btn btn-success btn-lg">Guardar Modificações</button>
    </form>
@endsection
