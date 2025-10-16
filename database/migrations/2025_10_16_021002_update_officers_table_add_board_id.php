<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('officers', function (Blueprint $table) {
            $table->foreignId('board_id')->nullable()->constrained('boards')->onDelete('set null');
            $table->integer('hierarchy_level')->default(0); // 0=President/Chair, 1=VP, 2=Member, etc.
        });
    }

    public function down()
    {
        Schema::table('officers', function (Blueprint $table) {
            $table->dropForeignIdFor('boards');
            $table->dropColumn('hierarchy_level');
        });
    }
};
