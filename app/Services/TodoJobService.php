<?php

namespace App\Services;

use App\Models\TodoJob;
use Illuminate\Support\Collection;

class TodoJobService{

    public function getAll():Collection{
        try{
            return TodoJob::all();
        }catch (\Exception $e){
            echo "Something went wrong";
            return new Collection(["Error"]);
        }

    }

    public function store(array $data):TodoJob{
        try{
            return TodoJob::create($data);
        }catch (\Exception $e){
            echo "Something went wrong";
            return new TodoJob(["Error1"]);
        }
    }

    public function getById(int $id):TodoJob{
        try{
            return TodoJob::findOrFail($id);
        }catch (\Exception $e){
            echo "Something went wrong";
            return new TodoJob(["Error2"]);
        }
    }

    public function editById(int $id,array $data):TodoJob{

        try{
            $todoJob = TodoJob::findOrFail($id);
            $todoJob->update($data);
            return $todoJob;
        }catch (\Exception $e){
            echo "Something went wrong";
            return new TodoJob(["Error3"]);
        }
    }

    public function deleteById(int $id):bool{
        try{
            $todoJob = TodoJob::findOrFail($id);
            $todoJob->delete();
            return true;
        }catch (\Exception $e){
            echo "Something went wrong";
            return false;
        }
    }

}
