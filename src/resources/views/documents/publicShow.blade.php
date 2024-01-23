@extends('layouts.naoautenticado')

@section('main-content')

    <h1>Ficha do documento</h1>

    <div class="row">
        <div class="col">
            <div class="card card-primary">
                <div class="card-header">
                    Dados Gerais
                </div>

                <div class="card-body">

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <p><strong>ID do Documento:</strong> {{ $document->id }}</p>
                    <p><strong>Caminho do Documento:</strong> {{ $document->path }}</p>

                    @php
                        $documentData = app('App\Http\Controllers\DocumentController')->getDocumentData($document->id);
                    @endphp

                    @if (is_array($documentData))
                        @foreach ($documentData as $data)
                            <p><strong>{{ $data->name }}:</strong> {{ $data->content }}</p>
                        @endforeach
                    @endif

                    @php
                        if (Storage::exists($document->path)) {
                            $content = Storage::get($document->path);
                            $type = Storage::mimeType($document->path);
                        } else {
                            $content = 'O documento solicitado não existe.';
                            $type = '';
                        }

                    @endphp

                    @if (Str::startsWith($type, 'image/'))
                        <img src="data:{{ $type }};base64,{{ base64_encode($content) }}" />
                    @else
                        <pre>{{ $content }}</pre>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
