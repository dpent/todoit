<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;

class TodoJob extends Model
{
    use HasFactory, Notifiable;
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
