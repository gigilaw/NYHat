<?php

use Illuminate\Database\Seeder;

class TournamentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tournaments')->insert([
            'title' => "New Year's Hat 2019",
            'capacity' => 40,
            'cost' => 50,
            'description' => 'Well how else are you going to spend your last weekend before the new decade?',
            'start_date' => '2019-12-28 15:00',
            'end_date' => '2019-12-28 18:00',
            'name_code' => 'nyhat2019',
            'avg_throwing' => 2.5,
            'avg_catching' => 2.5,
            'avg_speed' => 2.5,
            'avg_offense' => 2.5,
            'avg_defense' => 2.5,
        ]);
    }
}
