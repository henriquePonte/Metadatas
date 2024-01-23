@extends('layouts.autenticado')

@section('main-content')
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                @can('create', App\Models\User::class)
                    <a href="{{ route('departments.create') }}" class="btn btn-success btn-sm mb-3">Criar</a>
                @endcan
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Código</th>
                        <th class="text-end">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($departments as $department)
                        <tr>
                            <th>{{ $department->name }}</th>
                            <th>{{ $department->code }}</th>
                            <td class="text-end">
                                @can('delete', APP\Models\User::class)
                                    <form action="{{ route('departments.destroy', ['department' => $department->id]) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-delete btn-outline-danger">Eliminar</button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $departments->links() }}
            </div>
        </div>
    </div>
@endsection
