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
        $subField1 = ['CyberSecurity', 'AI', 'Web', 'Mobile'];
        $subField2 = ['sub1', 'sub2', 'sub3', 'sub4'];
        $subField3 = ['subF1', 'subF2', 'subF3', 'subF4'];
        
        Schema::create('sub_fields', function (Blueprint $table) use ($subField1, $subField2, $subField3) {
            $table->id();
            $table->enum('sub_field1', $subField1)->default('CyberSecurity');
            $table->enum('sub_field2', $subField2)->default('sub1');
            $table->enum('sub_field3', $subField3)->default('subF1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_fields');
    }
};

