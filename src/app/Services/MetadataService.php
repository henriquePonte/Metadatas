<?php

namespace App\Services;

use App\Models\Mdata;

class MetadataService
{
    public function getAllMdatas()
    {
        return Mdata::orderBy('id')->paginate(25);
    }

    public function createMdata($mdata)
    {
        Mdata::create(['mdata' => $mdata]);
    }

    public function getMdataById($id)
    {
        return Mdata::find($id);
    }

    public function updateMdata($id, $mdata)
    {
        $mdataModel = Mdata::find($id);
        if ($mdataModel) {
            $mdataModel->mdata = $mdata;
            $mdataModel->save();
        }
    }

    public function deleteMdata($id)
    {
        $mdata = Mdata::find($id);
        if ($mdata) {
            $mdata->delete();
        }
    }
}
