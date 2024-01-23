@extends('layouts.autenticado')
@section('main-content')

    <form action="{{ route('documentMdatas.store') }}" method="post">
        @csrf

        Nome: <input type="text" name="mdata" id="" class="form-control"><br>
        @error('mdata') <span class="text-danger">{{ $message }}</span><br>@enderror


        <button type="submit" class="btn btn-success btn-lg">Guardar Modificações</button>
    </form>


@endsection
