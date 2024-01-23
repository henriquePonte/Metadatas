<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\UserResource;
use App\Http\Resources\UserResourceCollection;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use PHPUnit\TextUI\Exception;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $users = User::all();
        if ($users->count() > 0){
            return response()->json([
                'status' => 200,
                'users' => $users //users variable
            ],200);
        } else {
            return response()->json([
                'status' => 404,
                'documents' => "sem user"], 404);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         //validar dados name email password e departement
         $validator = Validator::make($request->all(),[

            'name' => 'required|string|max:191',
            'email' => 'required|email|max:191',
            'password' => 'required|string|max:20',
            'department_id' => 'required|digits|max:1'

        ]);

        if($validator->fail()){ //user se falha retorna 422

            return response()->json([
                'status' => 422,
                'message' => "Nao existe esse utilizador"
            ],422);
        }else{
            $user = User::create([
                "name"=> $request->name,
                "email"=> $request->email,
                "password"=> Hash::make($request->password),
                "department_id"=> $request->department_id
            ]);
                 //find by id the user and update after

            if($user){
            //return 201 (created status and users created)
            return response()->json([
                'status' => 201,
                'message' => 'user criado com sucesso'
            ]);
            }else{
            return response()->json([
                'status' => 500,
                'message' => "deu errado"
            ]);
            };
        };
    }

    /**
     * Display the specified resource.
     */
    public function show($id) //get()
    {
        $user = User::find($id);
        if($user){
            return response()->json([
                'status' => 200,
                'users' => $user, //'user encontrado com sucesso'
            ]);
        }
        else{
            return response()->json([
                'status' => 404,
                'users' => 'user nao encontrado'
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
            'email' => 'required|email|max:191',
            'password' => 'required|string|max:20',
            'department_id' => 'required|digits|max:1'

        ]);

        if($validator->fail()){ //user se falha retorna 404

            return response()->json([
                'status' => 422,
                'message' => "Nao existe esse utilizador"
            ],422);
        }else{
            //find by id the user and update after

            $user = User::find($id);
            if($user){
                $user->update([
                    "name"=> $request->name,
                    "email"=> $request->email,
                    "password"=> Hash::make($request->password),
                    "department_id"=> $request->department_id
                ]);
            //return 201 (created status and users created)
            return response()->json([
                'status' => 200,
                'message' => 'user updated com sucesso'
            ]);
            }else{
            return response()->json([
                'status' => 404,
                'message' => "nao existe esse utilizador"
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
       $user = User::find($id);
       if ($user) {
            $user ->delete();
           return response()->json([
               "status"=> 200,
               "message"=> $user, "removido com sucesso"]);



   }else{
       return response()->json([
           'status' => 404,
           'message' => "Nao existe esse utilizador"
       ]);

        }
    }
};
