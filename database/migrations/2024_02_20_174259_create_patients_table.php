<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedSmallInteger('dob')->nullable()->comment('Age in years');
            $table->enum('sex', ['male', 'female'])->default('male');
            $table->timestamps();


        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
