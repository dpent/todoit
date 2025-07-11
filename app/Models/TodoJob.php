<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;

/**
 * @method static \Illuminate\Database\Eloquent\Builder|static create(array $attributes = [])
 * @method static \Illuminate\Database\Eloquent\Model|static findOrFail(mixed $id, array $columns = ['*'])
 */

/* A todo is a job/task a user can create
 * This means that a todo belongs to only one user
 * A user can have many todos
 * Todos can be seen on the todoList page
 * A todo can have many tags
 */

class TodoJob extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'title',
        'priority',
        'user_id',
    ];

    //Tag relation
    public function tags(): belongsToMany{
        return $this->belongsToMany(Tag::class,'tags_todos');
    }

    //User relation
    public function user(): belongsTo{
        return $this->belongsTo(User::class,'todos_users');
    }
}
