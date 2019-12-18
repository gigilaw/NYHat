<?php

namespace App\Jobs;

use App\Models\TournamentUser;
use Illuminate\Bus\Queueable;
use App\Mail\UserRegistration;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendEmails implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $tournamentUser;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(TournamentUser $tournamentUser)
    {
        $this->tournamentUser = $tournamentUser;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->tournamentUser->user->email, $this->tournamentUser->payment->reference_code)
        ->send(new UserRegistration($this->tournamentUser));
    }
}
