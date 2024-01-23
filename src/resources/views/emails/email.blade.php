@extends('layouts.simple')

@section('main-content')
    <h3> Olá {{ Auth::user()->username }},</h3> <br>

    <p> Obrigado por partilhar o documento! </p>
    <p> Aqui está o link para o seu documento: <a href="{{ asset('storage/' . $document->file_path) }}"> {{ $document->file_path }}</a></p>

    <p>Obrigado,<br>
        {{ config('app.name') }}</p>
@endsection
