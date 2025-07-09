<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Collection;

class UserService{


    public function getAll():Collection{
        return User::all();
    }

    public function store(array $data):User{
        return User::create($data);
    }

    public function getById(int $id):User{
        return User::findOrFail($id);
    }

    public function editById(int $id,array $data):User{
        $user = User::findOrFail($id);
        $user->update($data);
        return $user;
    }

    public function deleteById(int $id):bool{
        $user = User::findOrFail($id);
        $user->delete();
        return true;
    }


}
