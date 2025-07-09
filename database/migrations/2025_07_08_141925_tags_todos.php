<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tags_todos', function (Blueprint $table) {
            $table->id()->primary();
            $table->timestamp('created_at')->nullable();
            $table->unsignedBigInteger('tag_id');
            $table->unsignedBigInteger('todo_job_id');

            $table->foreign('tag_id')
                ->references('id')
                ->on('tags')
                ->onDelete('cascade');
            $table->foreign('todo_job_id')
                ->references('id')
                ->on('todo_jobs')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tags_todos');
    }
};
