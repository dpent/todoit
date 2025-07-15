<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    //Creates a table that stores all TodoJobs

    public function up(): void
    {
        Schema::create('todo_jobs', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('title');
            $table->string('priority');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id') //Needed for user based
                ->references('id')  //queries
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('todo_jobs');
    }
};
