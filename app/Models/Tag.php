<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;

class Tag extends Model
{

    use HasFactory, Notifiable;
    protected $guarded=[
        'title'
    ];

    public function todos(): belongsToMany{
        return $this->belongsToMany(TodoJob::class,'tags_todos');
    }
}
