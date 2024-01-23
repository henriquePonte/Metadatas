@extends('layouts.autenticado')

@section('main-content')
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                @can('create', App\Models\User::class)
                    <a href="{{ route('userTypes.create') }}" class="btn btn-success btn-sm mb-3">Criar</a>
                @endcan
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Type</th>
                        <th class="text-end">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($userTypes as $userType)
                        <tr>
                            <th>{{ $userType->type }}</th>
                            <td class="text-end">
                                @can('delete', APP\Models\User::class)
                                    <form action="{{ route('userTypes.destroy', ['userType' => $userType->id]) }}" method="POST" class="d-inline">
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
                {{ $userTypes->links() }}
            </div>
        </div>
    </div>
@endsection
