<?php

namespace App\Services;

use App\Models\TodoJob;
use Illuminate\Support\Collection;

class TodoJobService{

    public function getAll():Collection{
        return TodoJob::all();
    }

    public function store(array $data):TodoJob{
        return TodoJob::create($data);
    }

    public function getById(int $id):TodoJob{
        return TodoJob::findOrFail($id);
    }

    public function editById(int $id,array $data):TodoJob{
        $todoJob = TodoJob::findOrFail($id);
        $todoJob->update($data);
        return $todoJob;
    }

    public function deleteById(int $id):bool{
        $todoJob = TodoJob::findOrFail($id);
        $todoJob->delete();
        return true;
    }

}
