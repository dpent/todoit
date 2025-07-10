<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class UserService{


    public function getAll():Collection{
        try{
            return User::all();
        }catch (\Exception $e){
            Log::error($e->getMessage());
            return new Collection(["Error"]);
        }
    }

    public function store(array $data):User{
        try{
            return User::create($data);
        }catch (\Exception $e){
            Log::error($e->getMessage());
            return new User(["Error1"]);
        }
    }

    public function getById(int $id):User{
        try{
            return User::findOrFail($id);
        }catch (\Exception $e){
            Log::error($e->getMessage());
            return new User(["Error2"]);
        }

    }

    public function editById(int $id,array $data):User{

        try{
            $user = User::findOrFail($id);
            $user->update($data);
            return $user;
        }catch (\Exception $e){
            Log::error($e->getMessage());
            return new User(["Error3"]);
        }
    }

    public function deleteById(int $id):bool{

        try {
            $user = User::findOrFail($id);
            $user->delete();
            return true;
        }catch (\Exception $e){
            Log::error($e->getMessage());
            return false;
        }
    }


}
