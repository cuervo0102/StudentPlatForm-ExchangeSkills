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
    {
        $fields = ['field1', 'field2', 'field3'];
        $years = ['First Year', 'Second Year', 'Third Year', 'Forth Year', 'Last Year'];
        Schema::table('users', function (Blueprint $table) use ($fields, $years) {
            $table->enum('fields', $fields)->default('field1'); 
            $table->date('date_joining')->nullable();
            $table->enum('school_year', $years)->nullable();
            $table->text('linkdin_link')->nullable();
            $table->text('github_link')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['fields', 'date_joining', 'school_year', 'linkdin_link', 'github_link']);
        });
    }
};
