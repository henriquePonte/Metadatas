<div>
    <div class="row">
        <div class="col-6">
            <p class="lead">Filtro</p>
            <input type="text" wire:model.debounce.500ms="search" class="form-control">
        </div>
    </div>

    <div class="row mt-5">
        <div class="col">

            <a href="{{ route('documents.create') }}" class="btn btn-success btn-sm mb-3">Criar Documento</a>
            <a href="{{ route('documentMdatas.index') }}" class="btn btn-success btn-sm mb-3">Meta dados personalizados</a>


            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Documents ID</th>
                    <th>Documento Nome</th>
                    <th>Tipo Documento</th>
                    <th>Formato Documento</th>
                    <th class="text-end">Acções</th>
                </tr>
                </thead>

                <tbody>
                @foreach($documents as $document)
                    <tr>
                        <td>{{ $document->id }}</td>
                        <td>
                            @if ($documentData = \DB::table('document_mdatas')
                                ->where('document_id', $document->id)
                                ->where('mdata_id', 3)
                                ->select('content')
                                ->first())
                                {{ $documentData->content }}
                            @endif
                        </td>
                        <td>
                            @if ($documentData = \DB::table('document_mdatas')
                                ->where('document_id', $document->id)
                                ->where('mdata_id', 4)
                                ->select('content')
                                ->first())
                                {{ $documentData->content }}
                            @endif
                        </td>
                        <td>
                            @if ($documentData = \DB::table('document_mdatas')
                                ->where('document_id', $document->id)
                                ->where('mdata_id', 2)
                                ->select('content')
                                ->first())
                                {{ $documentData->content }}
                            @endif
                        </td>
                        <td class="text-right">

                            @can('view', $document)
                                <a href="{{ route('documents.show', ['document' => $document->id]) }}"
                                   class="btn btn-primary btn-outline">Ver</a>
                            @endcan
                            @can('update', $document)
                                <a href="{{ route('documents.edit', ['document' => $document->id]) }}"
                                   class="btn btn-warning btn-outline-sm">Modificar</a>

                            @endcan
                            @can('delete', $document)
                                <form action="{{ route('documents.destroy', ['document' => $document->id]) }}"
                                      method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-delete btn-outline-danger">Eliminar
                                    </button>
                                </form>
                            @endcan
                            @can('download', $document)
                                <a href="{{ route('documents.download', ['document' => $document->id]) }}"
                                   class="btn btn-outline-success">
                                    <i class="fas fa-download"></i>
                                </a>
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {{ $documents->links() }}
        </div>
    </div>
</div>

