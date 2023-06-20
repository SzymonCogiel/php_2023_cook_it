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
        Schema::table('users_details', function (Blueprint $table) {
            //
            $table->string('body_type')->after('marital_status');
            $table->string('complexion')->after('body_type');
            $table->string('city')->after('complexion');
            $table->string('state')->after('city');
            $table->string('country')->after('state');
            $table->string('languages')->after('country');
            $table->string('hobbies')->after('languages');
            $table->string('education')->after('hobbies');
            $table->string('occupation')->after('education');
            $table->string('income')->after('occupation');
            $table->string('about_myself')->after('income');
            $table->string('about_partner')->after('about_myself');
            $table->tinyInteger('status')->default('0')->nullable()->after('about_partner');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users_details', function (Blueprint $table) {
            //
            $table->dropColumn('body_type');
            $table->dropColumn('complexion');
            $table->dropColumn('city');
            $table->dropColumn('state');
            $table->dropColumn('country');
            $table->dropColumn('languages');
            $table->dropColumn('hobbies');
            $table->dropColumn('education');
            $table->dropColumn('occupation');
            $table->dropColumn('income');
            $table->dropColumn('about_myself');
            $table->dropColumn('about_partner');
            $table->dropColumn('status');
        });
    }
};
