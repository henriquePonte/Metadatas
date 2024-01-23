<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MetadataService;

class MetadataController extends Controller
{
    protected $metadataService;

    public function __construct(MetadataService $metadataService)
    {
        $this->metadataService = $metadataService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mdatas = $this->metadataService->getAllMdatas();
        return view('documentMdatas.index', ['mdatas' => $mdatas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('documentMdatas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->metadataService->createMdata($request->mdata);
        return redirect()->route('documentMdatas.index')->with('success', 'Mdata created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $format)
    {
        $mdatas = $this->metadataService->getAllMdatas();
        return view('documentMdatas.show', ['mdatas' => $mdatas]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mdata = $this->metadataService->getMdataById($id);
        return view('documentMdatas.edit', compact('mdata'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->metadataService->updateMdata($id, $request->mdata);
        return redirect()->route('documentMdatas.index')->with('success', 'Mdata updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->metadataService->deleteMdata($id);
        return redirect()->route('documentMdatas.index')->with('success', 'Mdata deleted successfully');
    }
}
