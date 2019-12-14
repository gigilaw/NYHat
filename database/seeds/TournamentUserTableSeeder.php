<?php

use App\Models\TournamentUser;
use Illuminate\Database\Seeder;

class TournamentUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(TournamentUser::class, 10)->create();
    }
}
