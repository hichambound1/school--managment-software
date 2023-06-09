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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string("name_en")->nullable();
            $table->string("name_ar")->nullable();
            $table->string("name_fr")->nullable();

            $table->string("description_en")->nullable();
            $table->string("description_ar")->nullable();
            $table->string("description_fr")->nullable();

            $table->integer("price")->nullable();
            $table->string("unit")->nullable();
            $table->string("per")->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};
