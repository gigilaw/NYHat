<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAvgSkillsToTournamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tournaments', function (Blueprint $table) {
            $table->float('avg_throwing')->nullable();
            $table->float('avg_catching')->nullable();
            $table->float('avg_speed')->nullable();
            $table->float('avg_offense')->nullable();
            $table->float('avg_defense')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tournaments', function (Blueprint $table) {
            $table->dropColumn(['avg_throwing', 'avg_catching', 'avg_speed', 'avg_offense', 'avg_defense']);
        });
    }
}
