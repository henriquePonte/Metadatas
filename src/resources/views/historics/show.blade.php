@extends('layouts.autenticado')

@section('main-content')

    <h1>Histórico do Documento</h1>

    <div class="row">
        <div class="col">
            <div class="card card-primary">
                <div class="card-header">
                    Entradas do Histórico
                </div>
                <div class="card-body">
                    @if ($historics->count())
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Data da Modificação</th>
                                <th>Modificações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($historics as $historic)
                                <tr>
                                    <td>{{ $historic->created_at }}</td>
                                    <td>{{ $historic->body }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>Não há entradas de histórico para este documento.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
