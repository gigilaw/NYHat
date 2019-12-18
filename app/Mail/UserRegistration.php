<?php

namespace App\Mail;

use App\Models\TournamentUser;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserRegistration extends Mailable
{
    use Queueable, SerializesModels;

    protected $tournamentUser;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(TournamentUser $tournamentUser)
    {
        $this->tournamentUser = $tournamentUser;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.registration')
                    ->from(env("MAIL_FROM_ADDRESS"), env("MAIL_FROM_NAME"))
                    ->subject("New Year's Hat 2019 Registration & Payment")
                    ->with([
                        'fullName' => $this->tournamentUser->user->fullName,
                        'referenceCode' => $this->tournamentUser->payment->reference_code,
                    ]);
    }
}
