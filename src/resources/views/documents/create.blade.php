@extends('layouts.autenticado')

@section('main-content')

    <form action="{{ route('documents.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        @foreach($mdatas as $key => $mdata)
            @if($key > 1)
                <b>{{ $mdata->mdata }}</b><br>
                <input type="hidden" name="mdata_id[]" value="{{ $mdata->id }}">
                <input type="text" name="mdata_value[]" class="form-control"><br>
            @endif
        @endforeach

        <b>Escolher departamento:</b> <br>
        @foreach ($departments as $department)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="selected_departments[]" value="{{ $department->id }}">
                <label class="form-check-label">{{ $department->name }}</label>
            </div>

            <b>Permissões do departamento:</b> <br>
            @foreach ($permitions as $permition)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="selected_permissions[]" value="{{ $permition->id }}">
                    <label class="form-check-label">{{ $permition->types }}</label>
                </div>
            @endforeach
            @error('permition') <span class="text-danger">{{ $message }}</span><br>@enderror
        @endforeach
        @error('selected_departments') <span class="text-danger">{{ $message }}</span><br>@enderror

        <b>Escolher Utilizador:</b> <br>
        @livewire('user-page')
        @error('selected_users') <span class="text-danger">{{ $message }}</span><br>@enderror


        <b>Escolher ficheiro:</b><br>
        <input type="file" name="file" class="form-control"><br>

        <input type="submit" value="Guardar Modificações" class="btn btn-primary">

    </form>

@endsection
