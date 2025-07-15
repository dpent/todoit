<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
//This service executes/implements all controller functions
//Controller communicates with the user and the service with the db
class UserService{

    //Get all Users
    public function getAll():Collection{
        try{
            return User::all();
        }catch (\Exception $e){
            Log::error($e->getMessage());
            return new Collection(["Error"]);
        }
    }

    //Save a user to the db
    public function store(array $data):User{
        try{
            return User::create($data);
        }catch (\Exception $e){
            Log::error($e->getMessage());
            return new User(["Error1"]);
        }
    }

    //Get a user based on an id
    public function getById(int $id):User{
        try{
            return User::findOrFail($id);
        }catch (\Exception $e){
            Log::error($e->getMessage());
            return new User(["Error2"]);
        }

    }

    //Edit a user based on an id
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

    //Delete a user based on an id
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
