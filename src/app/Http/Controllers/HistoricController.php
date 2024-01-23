<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Historic;
use App\Models\Document;

use Illuminate\Support\Facades\Redirect;
use App\Services\HistoricService;

class HistoricController extends Controller
{
    protected $historicService;

    public function __construct(HistoricService $historicService)
    {
        $this->historicService = $historicService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $historics = Historic::orderBy('id')->paginate(25);
        return view(
            'historics.index',
            [
                'historics' => $historics
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('historics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $historic = new Historic;
        $historic->body = $request->body;
        $historic->document_id = $request->document_id;
        $historic->save();
        return redirect()->route('historics')->with('sucess');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $historics = Historic::where('document_id', $id)->get();
    
        return view('historics.show')->with(['historics' => $historics, 'document_id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $historic = Historic::find($id);
        return view('historics.edit', compact('historics'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $historic = Historic::find($id);
        $historic->body = $request->input('body');
        $historic->document_id = $request->input("document_id");
        $historic->update();
        return redirect()->route('historics.index')->with('sucess');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $historic = Historic::find($id);
        if (empty($historic)) {
            abort(404);
        }
        
        $historic->delete();
        return redirect()->route('historics.index');
    }
}
