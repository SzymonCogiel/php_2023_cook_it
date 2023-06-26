<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChallengesTable extends Migration
{
    public function up()
    {
        Schema::create('challenges', function (Blueprint $table) {
            $table->id();
            $table->string('Author');
            $table->string('Dish');
            $table->string('Price');
            $table->string('Ingredients');
            $table->string('Allergens');
            $table->string('Level');
            $table->string('Note');
            $table->string('Challenger');
            $table->string('Photo')->nullable();
            $table->string('Status');
            $table->string('Review');
            $table->date('StartDate')->nullable();
            $table->date('FinalDate')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('challenges');
    }
}
