<?php

namespace App\Http\Controllers\Api;

use App\Models\DocumentMdata;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DocumentMdataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documentsMdata = DocumentMdata::all();
        if ($documentsMdata->count() > 0){
            return response()->json([
                'status' => 200,
                'documentsMdata' => $documentsMdata
            ],200);
        } else {
            return response()->json([
                'status' => 404,
                'documents' => "sem documentos"], 404);

        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $documentsMdata = DocumentMdata::find($id);
        if ($documentsMdata) {
            return response()->json([
            'status'=> 200,
            'document'=> $documentsMdata
            ],200);
        }else{
                return response()->json([
                    "status"=> 404,
                    "message"=> "sem documento"
                    ],404);

            }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DocumentMdata $documentMdata)
    {
        //
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
     //DELETE
     $documentsMdata = DocumentMdata::find($id);
     if ($documentsMdata) {
        $documentsMdata ->delete();
         return response()->json([
             "status"=> 200, 
             "message"=> $documentsMdata, "removido com sucesso"]);



 }else{
     return response()->json([
         'status' => 404,
         'message' => "Nao existe esse utilizador"
     ]);
    }
    }
};
