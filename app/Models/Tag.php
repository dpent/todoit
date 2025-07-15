<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;

/**
 * @method static \Illuminate\Database\Eloquent\Builder|static create(array $attributes = [])
 * @method static \Illuminate\Database\Eloquent\Model|static findOrFail(mixed $id, array $columns = ['*'])
 */

/*  Tags can be attached to Todos
 *  so that a more personalised
 *  experience is produced
 *  A todo can have multiple tags
 *  A tag can be attached to multiple todos
 */


/**
 * @OA\Schema(
 *     schema="Tag",
 *     type="object",
 *     title="Tag",
 *     description="Tag model used to personalise and categorise todo tasks",
 *     @OA\Property(
 *         property="title",
 *         type="string",
 *         format="text",
 *         example="Work-related",
 *         description="The name of a tag"
 *     )
 * )
 */

class Tag extends Model
{

    use HasFactory, Notifiable;
    protected $guarded=[
        'title'
    ];

    //Todo relation
    public function todos(): belongsToMany{
        return $this->belongsToMany(TodoJob::class,'tags_todos');
    }
}
