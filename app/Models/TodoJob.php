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


class TodoJob extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'title',
        'priority',
    ];

    public function tags(): belongsToMany{
        return $this->belongsToMany(Tag::class,'tags_todos');
    }

    public function user(): belongsTo{
        return $this->belongsTo(User::class,'todos_users');
    }
}
