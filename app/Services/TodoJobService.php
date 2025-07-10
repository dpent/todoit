<?php

namespace App\Services;

use App\Models\TodoJob;
use Illuminate\Support\Collection;
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

}
