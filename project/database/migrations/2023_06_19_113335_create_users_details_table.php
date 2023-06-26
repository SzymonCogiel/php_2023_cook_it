<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected $table = "user_details";
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_details', function (Blueprint $table) {
//            $table->id();
//            $table->integer('user_id');
//            $table->string('dob');
//            $table-> string('gender');
//            $table-> string('height');
//            $table-> string('marital_status');
//            $table->timestamps();
            $table->id();
            $table->integer('user_id');
            $table->string('skills');
            $table-> string('city');
            $table-> string('travel');
            $table-> string('cost');
            $table-> string('alergie')->nullable();
            $table->string('points');
            $table->string('photo');
            $table->timestamps();
        });

        //            $table->id();
//            $table->integer('user_id');
//            $table->string('cooking_skills');
//            $table-> string('city');
//            $table-> string('only_town');
//            $table-> string('price_for_meal');
//            $table-> string('allergies');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_details');
    }
};
