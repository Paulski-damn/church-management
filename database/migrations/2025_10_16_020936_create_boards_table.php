<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('boards', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // e.g., "Executive Board", "Board of Elders"
            $table->string('slug')->unique(); // e.g., "executive-board", "board-of-elders"
            $table->text('description'); // Description of the board
            $table->string('color')->default('indigo'); // Color for UI (indigo, blue, amber, etc.)
            $table->integer('display_order')->default(0); // Order in navigation
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('boards');
    }
};
