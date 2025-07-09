<?php

namespace App\Services;

use App\Models\Tag;
use Illuminate\Support\Collection;

class TagService{


    public function getAll():Collection{
        return Tag::all();
    }

    public function store(array $data):Tag{
        return Tag::create($data);
    }

    public function getById(int $id):Tag{
        return Tag::findOrFail($id);
    }

    public function editById(int $id,array $data):Tag{
        $user = Tag::findOrFail($id);
        $user->update($data);
        return $user;
    }

    public function deleteById(int $id):bool{
        $user = Tag::findOrFail($id);
        $user->delete();
        return true;
    }

}
