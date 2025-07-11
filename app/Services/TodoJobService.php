<?php

namespace App\Services;

use App\Models\Tag;
use App\Models\TodoJob;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TodoJobService{

    public function getAll():Collection{
        try{
            return TodoJob::all();
        }catch (\Exception $e){
            Log::error($e->getMessage());
            return new Collection(["Error"]);
        }

    }

    public function store(array $data):TodoJob{
        try{
            return TodoJob::create($data);
        }catch (\Exception $e){
            Log::error($e->getMessage());
            return new TodoJob(["Error1"]);
        }
    }

    public function getById(int $id):TodoJob{
        try{
            return TodoJob::findOrFail($id);
        }catch (\Exception $e){
            Log::error($e->getMessage());
            return new TodoJob(["Error2"]);
        }
    }

    public function editById(int $id,array $data):TodoJob{

        try{
            $todoJob = TodoJob::findOrFail($id);
            $todoJob->update($data);
            return $todoJob;
        }catch (\Exception $e){
            Log::error($e->getMessage());
            return new TodoJob(["Error3"]);
        }
    }

    public function deleteById(int $id):bool{
        try{
            $todoJob = TodoJob::findOrFail($id);
            $todoJob->delete();
            return true;
        }catch (\Exception $e){
            Log::error($e->getMessage());
            return false;
        }
    }

    public function getByUserId(){
        try{
            $todos=TodoJob::where('user_id',Auth::id())->get();
            $tags=[];
            foreach ($todos as $todo){
                $tagIds= $todo->tags()->pluck('tag_id')->toArray();
                $tags=Tag::whereIn('id',$tagIds)->get()->toArray();
            }

            return view('todoList',[
                'todos'=>$todos,
                'tags'=>$tags]);

        }catch (\Exception $e){
            Log::error($e->getMessage());
            return new TodoJob(["Error4"]);
        }
    }

    public function createTodo(Request $request){
        $request->validate([
            'title' => ['required', 'string'],
            'priority' => ['required', 'numeric'],
        ]);

        $todo=TodoJob::create([
            'title'=>$request->title,
            'priority'=>$request->priority,
            'user_id'=>Auth::id()
        ]);

        //return view('/todoList');
        return $this->getByUserId();
    }
}
