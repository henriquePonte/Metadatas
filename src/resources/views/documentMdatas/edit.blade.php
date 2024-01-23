@extends('layouts.autenticado')

@section('main-content')

    <form action="{{ route('documentMdatas.update', ['documentMdata' => $mdata->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        Nome: <input type="text" name="mdata" value="{{ old('mdata', $mdata->mdata) }}" id="" class="form-control"><br>

        @error('mdata') <span class="text-danger">{{ $message }}</span><br> @enderror

        <button type="submit" class="btn btn-success btn-lg">Guardar Modificações</button>
    </form>

@endsection
