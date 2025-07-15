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


/**
 * @OA\Schema(
 *     schema="TodoJob",
 *     type="object",
 *     title="TodoJob",
 *     description="Todo model used to keep track of todo tasks
 *      IMPORTANT: deleting a todoJob deletes all Tags assosiated with it",
 *     @OA\Property(
 *         property="title",
 *         type="string",
 *         format="text",
 *         example="Cook dinner",
 *         description="The name of a todo task"
 *     ),
 *     @OA\Property(
 *          property="priority",
 *          type="integer",
 *          format="int32",
 *          example=5,
 *          description="How important this task is"
 *      ),
 *     @OA\Property(
 *          property="user_id",
 *          type="integer",
 *          format="int32",
 *          example=100,
 *          description="The user_id of the user this task belongs to"
 *      ),
 * )
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
