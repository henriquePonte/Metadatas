@extends('layouts.simple')
@section('main-content')

    <form action="{{ route('users.update', ['user' => $user]) }}" method="post">
        @method('PUT')
        @csrf

        Nome: <input type="text" name="name" id="" class="form-control" value="{{ old('name', $user->name) }}"><br>
        @error('name') <span class="text-danger">{{ $message }}</span><br>@enderror

        Email: <input type="text" disabled = 'disabled' name="email" id="" class="form-control" value="{{ old('email', $user->email) }}"><br>
        @error('email') <span class="text-danger">{{ $message }}</span><br>@enderror

        Departamento:
        <select name="department_id" id="" class="form-control">
            @foreach ($departments as $department)
                <option value="{{ $department->id }}" {{ old('department_id', $user->department_id) == $department->id ? 'selected' : '' }}>{{ $department->name }}</option>
            @endforeach
        </select>
        <br>
        UserTypes: <input type="text" name="user_type_permition_id" id="" class="form-control"><br>
        @error('userTypes') <span class="text-danger">{{ $message }}</span><br>@enderror
        <button type="submit" class="btn btn-success btn-lg">Guardar Modificações</button>
    </form>

@endsection
