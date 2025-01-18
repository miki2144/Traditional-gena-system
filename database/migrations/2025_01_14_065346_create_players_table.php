<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id(); // This is an unsignedBigInteger by default
            $table->string('name');
            $table->string('position');
            $table->integer('age')->nullable();
            $table->decimal('height', 5, 2)->nullable();
            $table->decimal('weight', 5, 2)->nullable();
            $table->foreignId('team_id')->constrained('teams')->onDelete('cascade'); // Using foreignId for cleaner syntax
            $table->string('image')->nullable(); // New image column for storing image paths

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('players');
    }
}