<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TodoJob extends Model
{
    protected $fillable = [
        'title',
        'priority',
        'tag_id'
    ];
}
