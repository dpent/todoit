<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

//Basic controller for getting User data
class UserController extends Controller
{

    //We need a service for executing queries
    public function __construct(UserService $userService){
        $this->userService = $userService;
    }

    //Get all Users
    public function index():JsonResponse
    {
        $users=$this->userService->getAll();
        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):JsonResponse
    {
        $user=$this->userService->store($request->all());
        return response()->json($user,200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id):JsonResponse
    {
        $user=$this->userService->getById($id);
        return response()->json($user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id,array $data):JsonResponse
    {
        $user=$this->userService->editById($id, $data);
        return response()->json($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id):JsonResponse
    {
        $this->userService->deleteById($id);
        return response()->json("User with id $id has been deleted");
    }
}
