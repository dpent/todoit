<?php

namespace App\Services;

use App\Models\Tag;
use Illuminate\Support\Collection;

class TagService{


    public function getAll():Collection{
        try{
            return Tag::all();
        }catch (\Exception $e){
            echo "Something went wrong";
            return new Collection(["Error"]);
        }
    }

    public function store(array $data):Tag{
        try{
            return Tag::create($data);
        }catch (\Exception $e){
            echo "Something went wrong";
            return new Tag(["Error1"]);
        }
    }

    public function getById(int $id):Tag{
        try{
            return Tag::findOrFail($id);
        }catch (\Exception $e){
            echo "Something went wrong";
            return new Tag(["Error2"]);
        }
    }

    public function editById(int $id,array $data):Tag{

        try{
            $user = Tag::findOrFail($id);
            $user->update($data);
            return $user;
        }catch (\Exception $e){
            echo "Something went wrong";
            return new Tag(["Error3"]);
        }
    }

    public function deleteById(int $id):bool{

        try{
            $user = Tag::findOrFail($id);
            $user->delete();
            return true;
        }catch (\Exception $e){
            echo "Something went wrong";
            return false;
        }
    }

}
