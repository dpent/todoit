<?php

namespace App\Http\Controllers;

use App\Services\TagService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

//Basic controller for getting Tag data
class TagController extends Controller
{

    //We need a service for executing queries
    public function __construct(TagService $tagService){
        $this->tagService = $tagService;
    }

    //Get all Tags
    public function index():JsonResponse
    {
        $tags=$this->tagService->getAll();
        return response()->json($tags);
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
     * Remove the specified resource from storage.
     */
    public function destroy(string $id):JsonResponse
    {
        $this->tagService->deleteById($id);
        return response()->json("Tag with id $id has been deleted");
    }
}
