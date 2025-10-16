<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('officers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('position')->index(); // President, Vice President, Auditor, etc.
            $table->string('department')->nullable(); // Finance, Outreach, Worship, etc.
            $table->text('bio')->nullable(); // Officer bio
            $table->string('email')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('photo_path')->nullable(); // Path to officer photo
            $table->integer('order')->default(0); // For organizational chart ordering
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->date('term_start')->nullable();
            $table->date('term_end')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('officers');
    }
};
