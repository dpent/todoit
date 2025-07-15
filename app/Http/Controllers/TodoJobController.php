<?php

namespace App\Http\Controllers;

use App\Models\TodoJob;
use App\Services\TodoJobService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

//Basic controller for getting TodoJob data
class TodoJobController extends Controller
{
    //We need a service for executing queries
    public function __construct(TodoJobService $todoJobService){
        $this->todoJobService = $todoJobService;
    }

    //Get all TodoJobs
    public function index()
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

    //Get all TodoJobs that have user_id equal to the
    // authenticated user's id

    /**
     * @OA\Get(
     *     path="/todoList",
     *     summary="Gets all todo tasks linked to the authenticated user",
     *     tags={"todos for auth user"},
     *     @OA\Response(response=200, description="List of todos")
     * )
     */
    public function getByUserId(){
        $data=$this->todoJobService->getByUserId();
        return view('todoList',[
            'todos'=>$data['todos'],
            'tags'=>$data['tags']
        ]);
    }

    //Create a new TodoJob and store it in the db

    /**
     * @OA\Post(
     *     path="/createTodo",
     *     summary="Creates a todo that is linked to the authenticated user",
     *     tags={"todo creation"},
     *     @OA\RequestBody(
     *           required=true,
     *           @OA\JsonContent(
     *               required={"title", "priority"},
     *               @OA\Property(property="title", type="string", format="text", example="Cook dinner"),
     *               @OA\Property(property="priority", type="integer", format="number", example="5")
     *           )
     *       ),
     *     @OA\Response(response=200, description="Todo is created"),
     *     @OA\Response(response=400, description="Fill in all boxes")
     * )
     */
    public function createTodo(Request $request){

        return $this->todoJobService->createTodo($request);
    }

    /**
     * @OA\Get(
     *     path="/",
     *     summary="Home page",
     *     description="Redirects to the home page",
     *     @OA\Response(
     *         response=200,
     *         description="Success response"
     *     )
     * )
     */

    /**
     * @OA\Get(
     *     path="/login",
     *     summary="Login page",
     *     description="Contains the page needed for logging in",
     *     @OA\Response(
     *         response=200,
     *         description="Success response"
     *     )
     * )
     */

    /**
     * @OA\Get(
     *     path="/profile",
     *     summary="Profile info page",
     *     description="Returns all the necessary user info",
     *     @OA\Response(
     *         response=200,
     *         description="Success response"
     *     )
     * )
     */

    /**
     * @OA\Get(
     *     path="/loggedIn",
     *     summary="Page after being authenticated",
     *     description="Shows the authenticated user the dashboard. The user can see the todoList and profile details",
     *     @OA\Response(
     *         response=200,
     *         description="Success response"
     *     )
     * )
     */

    /**
     * @OA\Get(
     *     path="/signup",
     *     summary="Gets the page were the guest can create a new account",
     *     description="This page contains all the fields that the user must fill to create an account",
     *     @OA\Response(
     *         response=200,
     *         description="Success response"
     *     )
     * )
     */

    /**
     * @OA\Get(
     *     path="/createTodo",
     *     summary="Create todo task page",
     *     description="This page contains all the fields that the user must fill to create a todo task",
     *     @OA\Response(
     *         response=200,
     *         description="Success response"
     *     )
     * )
     */
}
