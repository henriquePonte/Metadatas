<?php

namespace App\Services;

use App\Models\DocumentMdata;
use Illuminate\Http\Request;

class DocumentMetadataService
{
    public function getAllDocumentMetadata()
    {
        return DocumentMdata::orderBy('id')->paginate(25);
    }

    public function storeDocumentMetadata(Request $request)
    {
        $documentMdata = new DocumentMdata;
        $documentMdata->mdata_id = $request->mdata_id;
        $documentMdata->document_id = $request->document_id;
        $documentMdata->content = $request->content;
        $documentMdata->value = $request->value;
        $documentMdata->save();

        return $documentMdata;
    }

    public function destroyDocumentMetadata(string $id)
    {
        $documentMdata = DocumentMdata::find($id);

        if (empty($documentMdata)) {
            abort(404);
        }

        $documentMdata->delete();

        return $documentMdata;
    }
}
