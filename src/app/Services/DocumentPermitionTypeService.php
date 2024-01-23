<?php

namespace App\Services;

use App\Models\DocumentPermitionType;

class DocumentPermitionTypeService
{
    public function createDocumentPermitionType(array $documentPermitionTypeData)
    {
        $documentPermitionType = new DocumentPermitionType;
        $documentPermitionType->document_permition_id = $documentPermitionTypeData['document_permition_id'];
        $documentPermitionType->document_id = $documentPermitionTypeData['document_id'];
        $documentPermitionType->user_id = $documentPermitionTypeData['user_id'];
        $documentPermitionType->department_id = $documentPermitionTypeData['department_id'];
        $documentPermitionType->save();

        return $documentPermitionType;
    }

    public function updateDocumentPermitionType(string $id, array $documentPermitionTypeData)
    {
        $documentPermitionType = DocumentPermitionType::find($id);
        if ($documentPermitionType) {
            $documentPermitionType->document_permition_id = $documentPermitionTypeData['document_permition_id'];
            $documentPermitionType->document_id = $documentPermitionTypeData['document_id'];
            $documentPermitionType->user_id = $documentPermitionTypeData['user_id'];
            $documentPermitionType->department_id = $documentPermitionTypeData['department_id'];
            $documentPermitionType->save();
        }

        return $documentPermitionType;
    }

    public function deleteDocumentPermitionType(string $id)
    {
        $documentPermitionType = DocumentPermitionType::find($id);
        if ($documentPermitionType) {
            $documentPermitionType->delete();
        }
    }
}
