@extends('layouts.autenticado')
@section('main-content')

    <h1>Ficha do documento</h1>
    <div class="row">
        <div class="col">
            <div class="card card-primary">
                <div class="card-header">
                    Dados Gerais
                </div>

                <div class="card-body">
                    <a href="{{ route('documents.share', $document->id) }}" class="btn btn-primary">Partilhar
                        Documento</a>
                    <a href="{{ route('historics.show', $document->id) }}" class="btn btn-secondary">Ver Histórico</a>

                    <a href="{{ route('emails.email') }}" class="btn btn-primary btn-sm mb-3">Enviar E-mail</a>

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

                    @if ($documentData)
                        <p><strong>Nome do Documento:</strong>
                            @if ($documentData = \DB::table('document_mdatas')
                                ->where('document_id', $document->id)
                                ->where('mdata_id', 3)
                                ->select('content')
                                ->first())
                                {{ $documentData->content }}
                            @endif
                        </p>

                        <p><strong>Tipo:</strong>
                            @if ($documentData = \DB::table('document_mdatas')
                                ->where('document_id', $document->id)
                                ->where('mdata_id', 4)
                                ->select('content')
                                ->first())
                                {{ $documentData->content }}
                            @endif
                        </p>
                        <p><strong>Formato:</strong>
                            @if ($documentData = \DB::table('document_mdatas')
                                ->where('document_id', $document->id)
                                ->where('mdata_id', 2)
                                ->select('content')
                                ->first())
                                {{ $documentData->content }}
                            @endif
                        </p>

                        <p><strong>Tamanho:</strong>
                            @if ($documentData = \DB::table('document_mdatas')
                                ->where('document_id', $document->id)
                                ->where('mdata_id', 1)
                                ->select('content')
                                ->first())
                                {{ $documentData->content }}
                            @endif
                        </p>
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
