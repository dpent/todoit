<?php

namespace App\Http\Controllers;

use App\Services\TagService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function __construct(TagService $tagService){
        $this->tagService = $tagService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index():JsonResponse
    {
        $tags=$this->tagService->getAll();
        return response()->json($tags);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):JsonResponse
    {
        $tag=$this->tagService->store($request->all());
        return response()->json($tag,200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id):JsonResponse
    {
        $tag=$this->tagService->getById($id);
        return response()->json($tag);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id,array $data):JsonResponse
    {
        $tag=$this->tagService->editById($id, $data);
        return response()->json($tag);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id):JsonResponse
    {
        $this->tagService->deleteById($id);
        return response()->json("Tag with id $id has been deleted");
    }
}
