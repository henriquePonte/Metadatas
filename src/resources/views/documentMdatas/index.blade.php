@extends('layouts.autenticado')

@section('main-content')
    <div class="container">
        <div class="row mt-5">
            <div class="col">
{{--                @can('create', App\Models\User::class)--}}
                    <a href="{{ route('documentMdatas.create') }}" class="btn btn-success btn-sm mb-3">Criar</a>
{{--                @endcan--}}
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th class="text-end">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($mdatas as $mdata)
                        <tr>
                            <th>{{ $mdata->mdata }}</th>
                            <td class="text-end">
                                @can('update', APP\Models\User::class)
                                    <a href="{{ route('documentMdatas.edit', ['documentMdata' => $mdata->id]) }}"
                                       class="btn btn-warning btn-outline-sm">Modificar</a>
                                @endcan

                                @can('delete', APP\Models\User::class)
                                    <form action="{{ route('documentMdatas.destroy', ['documentMdata' => $mdata->id]) }}" method="POST" class="d-inline">
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
                {{ $mdatas->links() }}
            </div>
        </div>
    </div>
@endsection
