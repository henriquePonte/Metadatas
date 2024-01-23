<?php

namespace App\Services;

use App\Models\Historic;

class HistoricService
{
    public function createHistoric(array $historicData)
    {
        $historic = new Historic;
        $historic->body = $historicData['body'];
        $historic->document_id = $historicData['document_id'];
        $historic->save();

        return $historic;
    }

    public function updateHistoric(string $id, array $historicData)
    {
        $historic = Historic::find($id);
        if ($historic) {
            $historic->body = $historicData['body'];
            $historic->document_id = $historicData['document_id'];
            $historic->save();
        }

        return $historic;
    }

    public function deleteHistoric(string $id)
    {
        $historic = Historic::find($id);
        if ($historic) {
            $historic->delete();
        }
    }
}
