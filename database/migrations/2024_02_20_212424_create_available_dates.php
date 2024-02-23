<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {

        Schema::dropIfExists('available_dates');

        Schema::create('available_dates', function (Blueprint $table) {
            $table->id();
            $table->time('time');
            $table->timestamps();
        });


    }


    public function down(): void
    {
        Schema::dropIfExists('available_dates');
    }
};
?>
