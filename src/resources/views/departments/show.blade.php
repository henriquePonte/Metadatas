@extends('layouts.autenticado')

@section('main-content')

    <h1>Departments</h1>

    @foreach($departments as $department)
        <div>
            <p>ID: {{ $department->id }}</p>
            <p>Nome: {{ $department->nome }}</p>
        </div>
    @endforeach

@endsection
