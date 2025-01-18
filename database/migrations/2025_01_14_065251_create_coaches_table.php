<?php
// database/migrations/xxxx_xx_xx_xxxxxx_create_coaches_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoachesTable extends Migration
{
    public function up()
    {
        Schema::create('coaches', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('age')->nullable(); // New age column
            $table->string('specialization')->nullable(); // Example for additional info
            $table->string('phone')->nullable(); // Another example for phone number
            $table->string('image')->nullable(); // New image column for storing image paths

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('coaches');
    }
}