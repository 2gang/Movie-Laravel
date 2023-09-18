<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
			$table->string('movie_name',50)->nullable();
            $table->string('genre_name',20)->nullable();
            $table->Integer('director_id')->nullable();
            $table->Integer('actor_id')->nullable();
            $table->string('info')->nullable();
            $table->string('movie_image',255)->nullable();
            $table->string('movie_url',100)->nullable();
			$table->Integer('state')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies');
    }
};
