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
       /**
         * This table follows the user's table.
         * It has two fields of type string for storing the file's path 
         * and text for storing the user's bio.
     */
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('photo')->nullable();
            $table->text('bio')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['photo', 'bio']);
        });
    }
};
