<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TodoJob extends Model
{
    protected $fillable = [
        'title',
        'priority',
    ];

    public function tag(): hasMany{
        return $this->hasMany(Tag::class);
    }

    public function user(): HasOne{
        return $this->hasOne(User::class);
    }
}
