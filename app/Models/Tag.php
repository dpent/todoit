<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tag extends Model
{
    protected $fillable = [
        'title'
    ];

    public function TodoJobs(): BelongsToMany{
        return $this->BelongsToMany(TodoJob::class);
    }
}
