@extends('layouts.autenticado')
@section('main-content')

    <form action="{{ route('users.store') }}" method="post">
        @csrf

        Nome: <input type="text" name="name" id="" class="form-control"><br>
        @error('name') <span class="text-danger">{{ $message }}</span><br>@enderror

        Email: <input type="text" name="email" id="" class="form-control"><br>
        @error('email') <span class="text-danger">{{ $message }}</span><br>@enderror

        Password: <input type="password" name="password" id="" class="form-control"><br>
        @error('password') <span class="text-danger">{{ $message }}</span><br>@enderror

        Departamento:
        <select name="department_id" id="" class="form-control">
            @foreach ($departments as $department)
                <option value="{{ $department->id }}" {{ old('department_id', $user->department_id) == $department->id ? 'selected' : '' }}>{{ $department->name }}</option>
            @endforeach
        </select>
        <br>
        @error('department_id') <span class="text-danger">{{ $message }}</span><br>@enderror

        User Type Permission:
        <input type="text" name="user_type_permition_id" id="" class="form-control"><br>
        @error('user_type_permition_id') <span class="text-danger">{{ $message }}</span><br>@enderror

        <button type="submit" class="btn btn-success btn-lg">Guardar Modificações</button>
    </form>


@endsection
