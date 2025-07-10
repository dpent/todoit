<?php

namespace App\Services;

use App\Models\Tag;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class TagService{


    public function getAll():Collection{
        try{
            return Tag::all();
        }catch (\Exception $e){
            Log::error($e->getMessage());
            return new Collection(["Error"]);
        }
    }

    public function store(array $data):Tag{
        try{
            return Tag::create($data);
        }catch (\Exception $e){
            Log::error($e->getMessage());
            return new Tag(["Error1"]);
        }
    }

    public function getById(int $id):Tag{
        try{
            return Tag::findOrFail($id);
        }catch (\Exception $e){
            Log::error($e->getMessage());
            return new Tag(["Error2"]);
        }
    }

    public function editById(int $id,array $data):Tag{

        try{
            $user = Tag::findOrFail($id);
            $user->update($data);
            return $user;
        }catch (\Exception $e){
            Log::error($e->getMessage());
            return new Tag(["Error3"]);
        }
    }

    public function deleteById(int $id):bool{

        try{
            $user = Tag::findOrFail($id);
            $user->delete();
            return true;
        }catch (\Exception $e){
            Log::error($e->getMessage());
            return false;
        }
    }

}
