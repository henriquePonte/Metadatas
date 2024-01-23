@extends('layouts.autenticado')

@section('main-content')

    <form action="{{ route('documents.update', ['document' => $document->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @foreach($mdatas as $key => $mdata)
            @if($key > 1)
                <b>{{ $mdata->mdata }}</b><br>
                <input type="hidden" name="mdata_id[]" value="{{ $mdata->id }}">
                <input type="text" name="mdata_value[]" class="form-control" value="{{ old('mdata_value.' . $key, $documentData = \DB::table('document_mdatas')
                            ->where('document_id', $document->id)
                            ->where('mdata_id', $mdata->id)
                            ->select('content')
                            ->first()->content ?? '') }}"><br>
            @endif
        @endforeach


        <b>Escolher departamento:</b> <br>
        @foreach ($departments as $department)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="selected_departments[]" value="{{ $department->id }}" {{ in_array($department->id, old('selected_departments', $document->selected_departments ?? [])) ? 'checked' : '' }}>
                <label class="form-check-label">{{ $department->name }}</label>
            </div>

            <b>Permissões do departamento:</b> <br>
            @foreach ($permitions as $permition)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="selected_permissions[]" value="{{ $permition->id }}" {{ in_array($permition->id, old('selected_permissions', $document->selected_permissions ?? [])) ? 'checked' : '' }}>
                    <label class="form-check-label">{{ $permition->types }}</label>
                </div>
            @endforeach
            @error('permition') <span class="text-danger">{{ $message }}</span><br>@enderror
        @endforeach
        @error('selected_departments') <span class="text-danger">{{ $message }}</span><br>@enderror

        <b>Escolher Utilizador:</b> <br>
        @foreach ($users as $user)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="selected_users[]" value="{{ $user->id }}" {{ in_array($user->id, old('selected_users', $document->selected_users ?? [])) ? 'checked' : '' }}>
                <label class="form-check-label">{{ $user->name }}</label>
            </div>

            <b>Permissões do Utilizador:</b> <br>
            @foreach ($permitions as $permition)
                <div class="form-check">
                    <input class="form-check-input user-permission" type="checkbox" name="selected_user_permissions[{{ $user->id }}][]" value="{{ $permition->id }}" {{ in_array($permition->id, old("selected_user_permissions.{$user->id}", $document->selected_user_permissions[$user->id] ?? [])) ? 'checked' : '' }}>
                    <label class="form-check-label">{{ $permition->types }}</label>
                </div>
            @endforeach
            @error('permition') <span class="text-danger">{{ $message }}</span><br>@enderror
        @endforeach
        @error('selected_users') <span class="text-danger">{{ $message }}</span><br>@enderror

        <b>Escolher ficheiro:</b><br>
        <input type="file" name="file" class="form-control" value="{{ old('path', $document->path)}}"><br>

        <input type="submit" value="Guardar Modificações" class="btn btn-primary">

    </form>

@endsection
