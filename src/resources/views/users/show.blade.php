@extends('layouts.simple')

@section('main-content')

    <h1 style="color: #141415;">Ficha de Utilizador</h1>

    <div class="card">
        <div class="card-header">
            <b>Dados User </b>
        </div>
        <div class="card-body">
            <card-body>
                Olá, {{ $user->name }} <br><br>
                <b>Os seus dados:</b> <br><br>
                <b>Nome:</b> {{ $user->name }} <br><br>
                <b>Email:</b> {{ $user->email }} <br><br>
                <td>
                    <b>Departamento: </b>
                    {{ app('App\Http\Controllers\UserController')->departmentName($user) }}
                </td>
            </card-body>

        </div>
    </div>
@endsection
