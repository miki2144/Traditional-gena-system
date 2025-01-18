<?php
// database/migrations/xxxx_xx_xx_xxxxxx_create_time_allocations_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimeAllocationsTable extends Migration
{
    public function up()
    {
        Schema::create('time_allocations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('game_id')->constrained()->onDelete('cascade'); // Use game_id instead of matchgame_id
            $table->time('start_time');
            $table->time('end_time');
            $table->integer('allocated_minutes')->nullable(); // New allocated minutes column
            $table->string('description')->nullable(); // New description column
            $table->string('status')->default('pending'); // New status column
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('time_allocations');
    }
}
