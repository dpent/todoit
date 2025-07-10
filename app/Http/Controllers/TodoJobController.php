<?php

namespace App\Http\Controllers;

use App\Services\TodoJobService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TodoJobController extends Controller
{
    public function __construct(TodoJobService $todoJobService){
        $this->todoJobService = $todoJobService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index():JsonResponse
    {
        $todos=$this->todoJobService->getAll();
        return response()->json($todos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):JsonResponse
    {
        $todo=$this->todoJobService->store($request->all());
        return response()->json($todo,200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id):JsonResponse
    {
        $todo=$this->todoJobService->getById($id);
        return response()->json($todo);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id,array $data):JsonResponse
    {
        $todo=$this->todoJobService->editById($id, $data);
        return response()->json($todo);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id):JsonResponse
    {
        $this->todoJobService->deleteById($id);
        return response()->json("Todo with id $id has been deleted");
    }
}
