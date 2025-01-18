<?php


// database/migrations/xxxx_xx_xx_xxxxxx_create_teams_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();  // This is unsignedBigInteger by default
            $table->string('name');
            $table->string('city')->nullable();
            $table->foreignId('coach_id')->nullable()->constrained('coaches')->onDelete('set null');
            $table->year('founded_year')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('teams');
    }
}
