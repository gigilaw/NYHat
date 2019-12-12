<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSkillsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nick_name')->nullable();
            $table->integer('age')->nullable();
            $table->integer('height')->nullable();
            $table->string('position')->nullable();
            $table->integer('throwing')->nullable();
            $table->integer('catching')->nullable();
            $table->integer('speed')->nullable();
            $table->integer('offense')->nullable();
            $table->integer('defense')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['position', 'throwing', 'catching', 'speed', 'offense', 'defense', 'nick_name', 'age', 'height']);
        });
    }
}
