<?php

namespace App\Http\Controllers\Api;

use App\Models\Department;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deparment = Department::all();
        if ($deparment->count() > 0){
            return response()->json([
                'status' => 200,
                'documentsMdata' => $deparment
            ],200);
        } else {
            return response()->json([
                'status' => 404,
                'documents' => "sem departamentos"], 404);

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
        $deparment = Department::find($id);
        if ($deparment) {
            return response()->json([
            'status'=> 200,
            'document'=> $deparment
            ],200);
        }else{
                return response()->json([
                    "status"=> 404,
                    "message"=> "sem departamento"
                    ],404);

            }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
    //validar dados name email password e departement
    $validator = Validator::make($request->all(),[

        'name' => 'required|string|max:191',
        'code' => 'required|digits|max:10',

    ]);
    
    if($validator->fail()){ //user se falha retorna 404

        return response()->json([
            'status' => 422,
            'message' => "Nao existe esse departamento"
        ],422);
    }else{
        //find by id the user and update after

        $deparment = Department::find($id);
        if($deparment){
            $deparment->update([
                "name"=> $request->name,
                "code"=> $request->code,
            ]);
        //return 201 (created status and users created)
        return response()->json([
            'status' => 200,
            'message' => 'departamento updated com sucesso'
        ]);
        }else{
        return response()->json([
            'status' => 404,
            'message' => "nao existe esse departamento"
        ]);
    }
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        //
    }
}
