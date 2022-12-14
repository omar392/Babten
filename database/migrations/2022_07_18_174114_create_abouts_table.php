<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->longText('about_ar');
            $table->longText('about_en');
            $table->longText('mission_ar');
            $table->longText('mission_en');
            $table->longText('vision_ar');
            $table->longText('vision_en');
            $table->longText('goals_ar');
            $table->longText('goals_en');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('abouts');
    }
};
