<?php

namespace App\Observers;

use App\Models\TodoJob;

class TodoJobObserver
{
    /**
     * Handle the TodoJob "created" event.
     */
    public function created(TodoJob $todoJob): void
    {
        //
    }

    /**
     * Handle the TodoJob "updated" event.
     */
    public function updated(TodoJob $todoJob): void
    {
        //
    }

    public function deleting(TodoJob $todoJob): void
    {
        $todoJob->tags()->each(function ($tag) {
            $tag->delete();
        });
    }

    /**
     * Handle the TodoJob "restored" event.
     */
    public function restored(TodoJob $todoJob): void
    {
        //
    }

    /**
     * Handle the TodoJob "force deleted" event.
     */
    public function forceDeleted(TodoJob $todoJob): void
    {
        //
    }
}
