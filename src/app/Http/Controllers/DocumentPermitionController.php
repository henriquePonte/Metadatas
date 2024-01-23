<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DocumentPermition;
use App\Services\DocumentPermitionService;


class DocumentPermitionController extends Controller
{
    protected $departmentService;

    public function __construct(DocumentPermitionService $departmentService)
    {
        $this->departmentService = $departmentService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documentsPermitions = DocumentPermition::orderBy('id');
        return view(
            'documentsPermitions.index',
            [
                'documentsPermitions' => $documentsPermitions
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('documentsPermitions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $documentsPermitions = new DocumentPermition;
        $documentsPermitions->document_permition_id = $request->document_permition_id;
        $documentsPermitions->document_id = $request->document_id;
        $documentsPermitions->user_id = $request->user_id;
        $documentsPermitions->department_id = $request->department_id;
        $documentsPermitions->save();
        return redirect()->route('documentsPermitions')->with('sucess');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('documentsPermitions.show', ['documentsPermitions' => DocumentPermition::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $documentsPermitions = new DocumentPermition;
        $documentsPermitions->document_permition_id = $request->input("document_permition_id");
        $documentsPermitions->document_id = $request->input("document_id");
        $documentsPermitions->user_id = $request->input("user_id");
        $documentsPermitions->department_id = $request->input("department_id");
        $documentsPermitions->save();
        return redirect()->route('documentsPermitions')->with('sucess');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
