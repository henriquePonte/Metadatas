@extends('layouts.autenticado')
@section('main-content')

    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Types</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($permitions as $permition)
                        <tr>
                            <th>{{ $permition->name }}</th>
                            <th>{{ $permition->code }}</th>
                            <td class="text-end">
{{--                                </form>--}}
{{--                                @endcan--}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $permitions->links() }}
            </div>
        </div>
    </div>
@endsection
