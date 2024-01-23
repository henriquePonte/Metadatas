@extends('layouts.autenticado')

@section('main-content')
    <div class="container">
        <div class="row mt-5">
            <div class="col">

                @livewire ('search-users2')

                <table class="table table-striped table-hover">
                    <!-- Resto do conteúdo da tabela -->
                </table>

{{--                {{ $users->links() }}--}}
            </div>
        </div>
    </div>
@endsection
