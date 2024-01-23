<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\DocumentResource;
use App\Http\Resources\DocumentResourceCollection;
use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;



class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        $documents = Document::all();
        if ($documents->count() > 0){
            return response()->json([
                'status' => 200,
                'documents' => $documents
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

        //validar dados path
        $validator = Validator::make($request->all(),[
            'path' => 'required|string|max:191',
        ]);


        if($validator->fail()){ //document se falha retorna 403
            return response()->json([
                'status'=> 400,
                'error'=> $validator->messages()
            ],422);
        }else{
            $document = Document::create($request->all()); //cria documentos
            //return 201 (created status and documents created)
            return response()->json([
                'status' => 201,
                'documents' => $document, 'documento criado com sucesso'
            ]);
        }

    }

    /**
     * Display the specified resource.
     */



    public function show(int $id) //get()
    {
        $document = Document::find($id);
        if ($document) {
            return response()->json([
            'status'=> 200,
            'document'=> $document
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
    public function update(Request $request, int $id)
    {
        //validar dados path
        $validator = Validator::make($request->all(),[
            'path' => 'required|string|max:191',
        ]);

        if($validator->fail()){ //user se falha retorna 404
            return response()->json([
                'status' => 422, // nao pode ser processado
                'message' => "Nao existe esse documento"
            ],422);
        }else{
            //find by id the document and update after
            $document = Document::find($id);
            $file = $request->file('file');
            if($document){
                $document->update([
                    "path" => $file->storeAs('files', $request->doc_name . '.' . $file->getClientOriginalExtension())
                ]);
            //return 201 (created status and document updated)
            return response()->json([
                'status' => 200,
                'message' => 'documento updated com sucesso'
            ]);
            }else{
            return response()->json([
                'status' => 404,
                'message' => "nao existe esse documento"
            ]);
        }
    };



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        //DELETE
        $document = Document::find($id);
        if ($document) {
            $document ->delete();
            return response()->json([
                "status"=> 200,
                "message"=> $document, "removido com sucesso"]);



    }else{
        return response()->json([
            'status' => 404,
            'message' => "Nao existe esse utilizador"
        ]);

        }
    }
};
