<?php

namespace App\Services;

use App\Models\Document;
use App\Models\DocumentMdata;
use App\Models\DocumentPermitionType;
use App\Models\Mdata;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\DTO\DocumentDTO;

class DocumentService
{
    public function createDocument(DocumentDTO $documentDTO, array $request)
    {
        $document = new Document($documentDTO->toArray());
        $document->save();

        $mdata = new Mdata([
            'doc_name' => $documentDTO->doc_name,
            'size' => $documentDTO->file_size,
            'type' => $documentDTO->type,
            'format' => $documentDTO->file_extension,
        ]);
        $mdata->save();

        $documentPermitionType = new DocumentPermitionType([
            'document_permition_id' => $request['selected_permissions'],
            'document_id' => $document->id,
            'user_id' => Auth::user()->id,
            'department_id' => $request['selected_departments'],
        ]);
        $documentPermitionType->save();

        return $document;
    }

    public function updateDocument(Document $document, array $documentData)
    {
        $document->update(['path' => $documentData['path']]);
        return $document;
    }

    public function deleteDocument(Document $document)
    {
        $document->delete();
    }

    public function downloadDocument(Document $document)
    {
        $path = $document->path;

        if (!Storage::exists($path)) {
            return false;
        }

        return Storage::download($path);
    }

    public function getDocumentData($documentId)
    {
        return DocumentMdata::join('mdatas', 'document_mdatas.mdata_id', '=', 'mdatas.id')
            ->select('mdatas.*')
            ->where('document_mdatas.document_id', $documentId)
            ->first();
    }
}
